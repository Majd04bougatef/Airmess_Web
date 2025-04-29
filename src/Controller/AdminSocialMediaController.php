<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Entity\User;
use App\Entity\Commentaire;
use App\Form\SocialMediaType;
use App\Repository\SocialMediaRepository;
use App\Repository\UserRepository;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\ForbiddenWordsChecker;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/admin/social-media')]
class AdminSocialMediaController extends AbstractController
{
    private const POSTS_PER_PAGE = 10;
    private const DEFAULT_USER_ID = 1;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
        private SluggerInterface $slugger,
        private PaginatorInterface $paginator,
        private string $uploadsDirectory,
        private ForbiddenWordsChecker $forbiddenWordsChecker
    ) {
        // Vérifier que le répertoire d'upload existe et est accessible
        if (!file_exists($this->uploadsDirectory)) {
            mkdir($this->uploadsDirectory, 0777, true);
        }
    }

    #[Route('/', name: 'admin_social_media_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository, Request $request): Response
    {
        $search = $request->query->get('search');
        $queryBuilder = $socialMediaRepository->createQueryBuilder('s')
            ->select('s', 'u')
            ->leftJoin('s.user', 'u')
            ->orderBy('s.publicationDate', 'DESC');
        
        if ($search) {
            $queryBuilder->andWhere('s.titre LIKE :search OR s.contenu LIKE :search OR s.lieu LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            self::POSTS_PER_PAGE
        );

        return $this->render('dashAdmin/socialPage.html.twig', [
            'pagination' => $pagination,
            'search' => $search
        ]);
    }

    #[Route('/new', name: 'admin_social_media_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $socialMedia = new SocialMedia();
        $socialMedia->setUser($this->getDefaultUser());
        $socialMedia->setPublicationDate(new \DateTime());
        $socialMedia->setLikee(0);
        $socialMedia->setDislike(0);

        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forbiddenInTitle = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getTitre());
            $forbiddenInContent = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getContenu());

            if (!empty($forbiddenInTitle) || !empty($forbiddenInContent)) {
                $message = 'Contient des mots interdits: ';
                if (!empty($forbiddenInTitle)) {
                    $message .= 'Titre: ' . implode(', ', $forbiddenInTitle) . ' ';
                }
                if (!empty($forbiddenInContent)) {
                    $message .= 'Contenu: ' . implode(', ', $forbiddenInContent);
                }
                $this->addFlash('error', trim($message));
                
                return $this->render('dashAdmin/social_media_new.html.twig', [
                    'social_media' => $socialMedia,
                    'form' => $form->createView(),
                    'forbidden_words' => [
                        'title' => $forbiddenInTitle,
                        'content' => $forbiddenInContent 
                    ]
                ]);
            }

            try {
                $this->handleImageUpload($form, $socialMedia, $request);
                $this->entityManager->persist($socialMedia);
                $this->entityManager->flush();

                $this->addFlash('success', 'Publication ajoutée avec succès!');
                return $this->redirectToRoute('admin_social_media_index');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'ajout de la publication: ' . $e->getMessage());
            }
        }

        return $this->render('dashAdmin/social_media_new.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idEB}', name: 'admin_social_media_show', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function show(SocialMedia $socialMedia, CommentaireRepository $commentaireRepository, Request $request): Response
    {
        $commentaires = $commentaireRepository->createQueryBuilder('c')
            ->where('c.socialMedia = :socialMedia')
            ->leftJoin('c.user', 'u')
            ->setParameter('socialMedia', $socialMedia)
            ->orderBy('c.idC', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('dashAdmin/social_media_show.html.twig', [
            'social_media' => $socialMedia,
            'commentaires' => $commentaires
        ]);
    }

    #[Route('/{idEB}/edit', name: 'admin_social_media_edit', methods: ['GET', 'POST'], requirements: ['idEB' => '\d+'])]
    public function edit(Request $request, SocialMedia $socialMedia): Response
    {
        $originalImage = $socialMedia->getImagemedia();
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forbiddenInTitle = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getTitre());
            $forbiddenInContent = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getContenu());

            if (!empty($forbiddenInTitle) || !empty($forbiddenInContent)) {
                $message = 'Contient des mots interdits: ';
                if (!empty($forbiddenInTitle)) {
                    $message .= 'Titre: ' . implode(', ', $forbiddenInTitle) . ' ';
                }
                if (!empty($forbiddenInContent)) {
                    $message .= 'Contenu: ' . implode(', ', $forbiddenInContent);
                }
                $this->addFlash('error', trim($message));
                
                return $this->render('dashAdmin/social_media_edit.html.twig', [
                    'social_media' => $socialMedia,
                    'form' => $form->createView(),
                    'forbidden_words' => [
                        'title' => $forbiddenInTitle,
                        'content' => $forbiddenInContent
                    ]
                ]);
            }

            $this->handleImageUpload($form, $socialMedia, $request, $originalImage);
            $this->entityManager->flush();

            $this->addFlash('success', 'Publication mise à jour avec succès!');
            return $this->redirectToRoute('admin_social_media_index');
        }

        return $this->render('dashAdmin/social_media_edit.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idEB}', name: 'admin_social_media_delete', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function delete(Request $request, SocialMedia $socialMedia): Response
    {
        if ($this->isCsrfTokenValid('delete'.$socialMedia->getIdEB(), $request->request->get('_token'))) {
            // Supprimer l'image associée si elle existe
            if ($socialMedia->getImagemedia()) {
                $imagePath = $this->uploadsDirectory . '/' . $socialMedia->getImagemedia();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            $this->entityManager->remove($socialMedia);
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Publication supprimée avec succès!');
        }

        return $this->redirectToRoute('admin_social_media_index');
    }

    #[Route('/{idEB}/comments', name: 'admin_social_media_comments', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function comments(SocialMedia $socialMedia, CommentaireRepository $commentaireRepository): Response
    {
        $commentaires = $commentaireRepository->findBy(['socialMedia' => $socialMedia], ['idC' => 'DESC']);

        return $this->render('dashAdmin/social_media_comments.html.twig', [
            'social_media' => $socialMedia,
            'commentaires' => $commentaires
        ]);
    }

    #[Route('/comments/{idC}/delete', name: 'admin_comment_delete', methods: ['POST'], requirements: ['idC' => '\d+'])]
    public function deleteComment(Request $request, Commentaire $commentaire): Response
    {
        if ($this->isCsrfTokenValid('delete_comment'.$commentaire->getIdC(), $request->request->get('_token'))) {
            $socialMedia = $commentaire->getSocialMedia();
            
            $this->entityManager->remove($commentaire);
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Commentaire supprimé avec succès!');
            
            return $this->redirectToRoute('admin_social_media_comments', ['idEB' => $socialMedia->getIdEB()]);
        }

        return $this->redirectToRoute('admin_social_media_index');
    }

    #[Route('/comments/{idC}/edit', name: 'admin_comment_edit', methods: ['GET', 'POST'], requirements: ['idC' => '\d+'])]
    public function editComment(Request $request, Commentaire $commentaire): Response
    {
        $form = $this->createForm(\App\Form\CommentaireEditType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Commentaire modifié avec succès!');
            
            return $this->redirectToRoute('admin_social_media_comments', [
                'idEB' => $commentaire->getSocialMedia()->getIdEB()
            ]);
        }

        return $this->render('dashAdmin/comment_edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'social_media' => $commentaire->getSocialMedia()
        ]);
    }

    #[Route('/statistics', name: 'admin_social_media_statistics', methods: ['GET'])]
    public function statistics(SocialMediaRepository $socialMediaRepository, CommentaireRepository $commentaireRepository): Response
    {
        // Statistiques générales
        $totalPosts = $socialMediaRepository->count([]);
        $totalComments = $commentaireRepository->count([]);
        $totalLikes = $socialMediaRepository->createQueryBuilder('s')
            ->select('SUM(s.likee) as totalLikes')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;
        $totalDislikes = $socialMediaRepository->createQueryBuilder('s')
            ->select('SUM(s.dislike) as totalDislikes')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;

        // Posts les plus populaires
        $mostLikedPosts = $socialMediaRepository->findMostLiked(5);
        
        // Posts les plus commentés
        $mostCommentedPosts = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.idEB', 's.titre', 's.contenu', 's.publicationDate', 's.lieu', 's.likee', 's.dislike', 'COUNT(c.idC) as commentCount')
            ->leftJoin('s.commentaires', 'c')
            ->groupBy('s.idEB', 's.titre', 's.contenu', 's.publicationDate', 's.lieu', 's.likee', 's.dislike')
            ->orderBy('commentCount', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        // Statistiques par lieu
        $postsByLocation = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.lieu', 'COUNT(s.idEB) as postCount')
            ->groupBy('s.lieu')
            ->orderBy('postCount', 'DESC')
            ->getQuery()
            ->getResult();

        // Statistiques temporelles (derniers 7 jours)
        $lastWeekPosts = $socialMediaRepository->createQueryBuilder('s')
            ->select('SUBSTRING(s.publicationDate, 1, 10) as date', 'COUNT(s.idEB) as postCount')
            ->where('s.publicationDate >= :lastWeek')
            ->setParameter('lastWeek', new \DateTime('-7 days'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('dashAdmin/social_media_statistics.html.twig', [
            'totalPosts' => $totalPosts,
            'totalComments' => $totalComments,
            'totalLikes' => $totalLikes,
            'totalDislikes' => $totalDislikes,
            'mostLikedPosts' => $mostLikedPosts,
            'mostCommentedPosts' => $mostCommentedPosts,
            'postsByLocation' => $postsByLocation,
            'lastWeekPosts' => $lastWeekPosts
        ]);
    }

    #[Route('/trends', name: 'admin_social_media_trends', methods: ['GET'])]
    public function trends(SocialMediaRepository $socialMediaRepository): Response
    {
        // Analyse des hashtags populaires
        $hashtags = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.contenu')
            ->where('s.contenu LIKE :hashtag')
            ->setParameter('hashtag', '%#%')
            ->getQuery()
            ->getResult();

        $hashtagCounts = [];
        foreach ($hashtags as $post) {
            preg_match_all('/#(\w+)/', $post['contenu'], $matches);
            foreach ($matches[1] as $hashtag) {
                $hashtagCounts[$hashtag] = ($hashtagCounts[$hashtag] ?? 0) + 1;
            }
        }
        arsort($hashtagCounts);
        $topHashtags = array_slice($hashtagCounts, 0, 10, true);

        // Analyse des sujets tendances (mots-clés fréquents)
        $posts = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.contenu', 's.titre')
            ->orderBy('s.publicationDate', 'DESC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();

        $wordCounts = [];
        $stopWords = ['le', 'la', 'les', 'un', 'une', 'des', 'et', 'ou', 'mais', 'donc', 'car', 'ni', 'pour', 'par', 'avec', 'sans', 'sur', 'sous', 'dans', 'de', 'du', 'ce', 'cet', 'cette', 'ces', 'mon', 'ton', 'son', 'notre', 'votre', 'leur', 'leurs', 'qui', 'que', 'quoi', 'dont', 'où', 'quand', 'comment', 'pourquoi'];
        
        foreach ($posts as $post) {
            $text = strtolower($post['contenu'] . ' ' . $post['titre']);
            $words = str_word_count($text, 1, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿ');
            foreach ($words as $word) {
                if (strlen($word) > 3 && !in_array($word, $stopWords)) {
                    $wordCounts[$word] = ($wordCounts[$word] ?? 0) + 1;
                }
            }
        }
        arsort($wordCounts);
        $topKeywords = array_slice($wordCounts, 0, 20, true);

        // Posts les plus engageants
        $engagingPosts = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.idEB', 's.titre', 's.contenu', 's.publicationDate', 's.lieu', 's.likee', 's.dislike', 'COUNT(c.idC) as commentCount')
            ->leftJoin('s.commentaires', 'c')
            ->groupBy('s.idEB', 's.titre', 's.contenu', 's.publicationDate', 's.lieu', 's.likee', 's.dislike')
            ->orderBy('s.likee', 'DESC')
            ->addOrderBy('s.dislike', 'DESC')
            ->addOrderBy('commentCount', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        return $this->render('dashAdmin/social_media_trends.html.twig', [
            'topHashtags' => $topHashtags,
            'topKeywords' => $topKeywords,
            'engagingPosts' => $engagingPosts
        ]);
    }

    #[Route('/search-ajax', name: 'admin_social_media_search_ajax', methods: ['GET'])]
    public function searchAjax(SocialMediaRepository $socialMediaRepository, Request $request): Response
    {
        $search = $request->query->get('search');
        $queryBuilder = $socialMediaRepository->createQueryBuilder('s')
            ->select('s', 'u')
            ->leftJoin('s.user', 'u')
            ->orderBy('s.publicationDate', 'DESC');
        
        if ($search) {
            $queryBuilder->andWhere('s.titre LIKE :search OR s.contenu LIKE :search OR s.lieu LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            self::POSTS_PER_PAGE
        );

        return $this->render('dashAdmin/_social_media_list.html.twig', [
            'pagination' => $pagination
        ]);
    }

    #[Route('/statistics-ajax', name: 'admin_social_media_statistics_ajax', methods: ['GET'])]
    public function statisticsAjax(SocialMediaRepository $socialMediaRepository, CommentaireRepository $commentaireRepository): Response
    {
        // Statistiques générales
        $totalPosts = $socialMediaRepository->count([]);
        $totalComments = $commentaireRepository->count([]);
        $totalLikes = $socialMediaRepository->createQueryBuilder('s')
            ->select('SUM(s.likee) as totalLikes')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;
        $totalDislikes = $socialMediaRepository->createQueryBuilder('s')
            ->select('SUM(s.dislike) as totalDislikes')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;

        // Posts les plus populaires
        $mostLikedPosts = $socialMediaRepository->findMostLiked(5);
        
        // Posts les plus commentés
        $mostCommentedPosts = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.idEB', 's.titre', 's.contenu', 's.publicationDate', 's.lieu', 's.likee', 's.dislike', 'COUNT(c.idC) as commentCount')
            ->leftJoin('s.commentaires', 'c')
            ->groupBy('s.idEB', 's.titre', 's.contenu', 's.publicationDate', 's.lieu', 's.likee', 's.dislike')
            ->orderBy('commentCount', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        // Statistiques par lieu
        $postsByLocation = $socialMediaRepository->createQueryBuilder('s')
            ->select('s.lieu', 'COUNT(s.idEB) as postCount')
            ->groupBy('s.lieu')
            ->orderBy('postCount', 'DESC')
            ->getQuery()
            ->getResult();

        // Statistiques temporelles (derniers 7 jours)
        $lastWeekPosts = $socialMediaRepository->createQueryBuilder('s')
            ->select('SUBSTRING(s.publicationDate, 1, 10) as date', 'COUNT(s.idEB) as postCount')
            ->where('s.publicationDate >= :lastWeek')
            ->setParameter('lastWeek', new \DateTime('-7 days'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->json([
            'totalPosts' => $totalPosts,
            'totalComments' => $totalComments,
            'totalLikes' => $totalLikes,
            'totalDislikes' => $totalDislikes,
            'mostLikedPosts' => $mostLikedPosts,
            'mostCommentedPosts' => $mostCommentedPosts,
            'postsByLocation' => $postsByLocation,
            'lastWeekPosts' => $lastWeekPosts
        ]);
    }

    #[Route('/search', name: 'admin_social_media_search', methods: ['POST'])]
    public function search(Request $request, SocialMediaRepository $socialMediaRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $keyword = $data['keyword'] ?? '';
        $type = $data['type'] ?? 'all';
        $date = $data['date'] ?? 'all';
        $location = $data['location'] ?? 'all';

        $queryBuilder = $socialMediaRepository->createQueryBuilder('s');

        // Recherche par mot-clé
        if ($keyword) {
            $queryBuilder
                ->andWhere('s.titre LIKE :keyword OR s.contenu LIKE :keyword')
                ->setParameter('keyword', '%' . $keyword . '%');
        }

        // Filtre par type de contenu
        switch ($type) {
            case 'posts':
                $queryBuilder->andWhere('s.type = :type')
                    ->setParameter('type', 'post');
                break;
            case 'comments':
                $queryBuilder->andWhere('s.type = :type')
                    ->setParameter('type', 'comment');
                break;
            case 'hashtags':
                $queryBuilder->andWhere('s.contenu LIKE :hashtag')
                    ->setParameter('hashtag', '%#%');
                break;
        }

        // Filtre par date
        switch ($date) {
            case 'today':
                $queryBuilder->andWhere('s.publicationDate >= :today')
                    ->setParameter('today', new \DateTime('today'));
                break;
            case 'week':
                $queryBuilder->andWhere('s.publicationDate >= :week')
                    ->setParameter('week', new \DateTime('-7 days'));
                break;
            case 'month':
                $queryBuilder->andWhere('s.publicationDate >= :month')
                    ->setParameter('month', new \DateTime('-1 month'));
                break;
            case 'year':
                $queryBuilder->andWhere('s.publicationDate >= :year')
                    ->setParameter('year', new \DateTime('-1 year'));
                break;
        }

        // Filtre par lieu
        if ($location !== 'all') {
            $queryBuilder->andWhere('s.lieu = :location')
                ->setParameter('location', $location);
        }

        // Trier par date de publication
        $queryBuilder->orderBy('s.publicationDate', 'DESC');

        $results = $queryBuilder->getQuery()->getResult();

        // Formater les résultats
        $formattedResults = array_map(function($item) {
            return [
                'id' => $item->getIdEB(),
                'titre' => $item->getTitre(),
                'contenu' => $item->getContenu(),
                'lieu' => $item->getLieu(),
                'date' => $item->getPublicationDate()->format('Y-m-d H:i:s'),
                'likes' => $item->getLikee(),
                'dislikes' => $item->getDislike(),
                'commentCount' => count($item->getCommentaires())
            ];
        }, $results);

        return new JsonResponse([
            'success' => true,
            'results' => $formattedResults,
            'total' => count($formattedResults)
        ]);
    }

    private function getDefaultUser(): User
    {
        $defaultUser = $this->userRepository->find(self::DEFAULT_USER_ID);
        if (!$defaultUser) {
            throw new \LogicException('Default user with ID ' . self::DEFAULT_USER_ID . ' not found in the database. Please ensure this user exists.');
        }
        return $defaultUser;
    }

    private function handleImageUpload($form, SocialMedia $socialMedia, Request $request, ?string $originalImage = null): void
    {
        $imageFile = $form->get('imagemedia')->getData();

        if ($imageFile instanceof UploadedFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $this->slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

            try {
                $imageFile->move($this->uploadsDirectory, $newFilename);
                
                // Supprimer l'ancien fichier si un original existe
                if ($originalImage && $originalImage !== $newFilename) {
                    $oldFilePath = $this->uploadsDirectory . '/' . $originalImage;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
                
                $socialMedia->setImagemedia($newFilename);
            } catch (FileException $e) {
                throw new \Exception('Erreur lors du téléchargement du média: ' . $e->getMessage());
            }
        } elseif (!$originalImage && !$imageFile) {
            // Si pas d'image originale et pas de nouvelle image, on laisse le champ à null
            $socialMedia->setImagemedia(null);
        }
        // Si pas de nouvelle image mais une image originale existe, on conserve l'original
    }
} 