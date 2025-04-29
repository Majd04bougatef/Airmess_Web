<?php

namespace App\Service;

use App\Entity\ScheduledPost;
use App\Entity\SocialMedia;
use Doctrine\ORM\EntityManagerInterface;

class ScheduledPostPublisher
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function publishScheduledPosts(): void
    {
        $scheduledPosts = $this->entityManager->getRepository(ScheduledPost::class)->findPostsToPublish();

        foreach ($scheduledPosts as $scheduledPost) {
            $this->publishPost($scheduledPost);
        }

        $this->entityManager->flush();
    }

    private function publishPost(ScheduledPost $scheduledPost): void
    {
        $socialMedia = new SocialMedia();
        $socialMedia->setTitre($scheduledPost->getTitre());
        $socialMedia->setContenu($scheduledPost->getContenu());
        $socialMedia->setLieu($scheduledPost->getLieu());
        $socialMedia->setUser($scheduledPost->getUser());
        $socialMedia->setPublicationDate($scheduledPost->getScheduledDate());
        $socialMedia->setImagemedia($scheduledPost->getImagemedia());
        $socialMedia->setLikee(0);
        $socialMedia->setDislike(0);

        $this->entityManager->persist($socialMedia);
        $this->entityManager->remove($scheduledPost);
    }
} 