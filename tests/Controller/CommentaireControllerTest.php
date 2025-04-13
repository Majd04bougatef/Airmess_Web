<?php

namespace App\Tests\Controller;

use App\Entity\Commentaire;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CommentaireControllerTest extends WebTestCase{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $commentaireRepository;
    private string $path = '/commentaire/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->commentaireRepository = $this->manager->getRepository(Commentaire::class);

        foreach ($this->commentaireRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Commentaire index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'commentaire[description]' => 'Testing',
            'commentaire[numberlike]' => 'Testing',
            'commentaire[numberdislike]' => 'Testing',
            'commentaire[proposedDescription]' => 'Testing',
            'commentaire[isApproved]' => 'Testing',
            'commentaire[socialMedia]' => 'Testing',
            'commentaire[user]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->commentaireRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Commentaire();
        $fixture->setDescription('My Title');
        $fixture->setNumberlike('My Title');
        $fixture->setNumberdislike('My Title');
        $fixture->setProposedDescription('My Title');
        $fixture->setIsApproved('My Title');
        $fixture->setSocialMedia('My Title');
        $fixture->setUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Commentaire');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Commentaire();
        $fixture->setDescription('Value');
        $fixture->setNumberlike('Value');
        $fixture->setNumberdislike('Value');
        $fixture->setProposedDescription('Value');
        $fixture->setIsApproved('Value');
        $fixture->setSocialMedia('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'commentaire[description]' => 'Something New',
            'commentaire[numberlike]' => 'Something New',
            'commentaire[numberdislike]' => 'Something New',
            'commentaire[proposedDescription]' => 'Something New',
            'commentaire[isApproved]' => 'Something New',
            'commentaire[socialMedia]' => 'Something New',
            'commentaire[user]' => 'Something New',
        ]);

        self::assertResponseRedirects('/commentaire/');

        $fixture = $this->commentaireRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getNumberlike());
        self::assertSame('Something New', $fixture[0]->getNumberdislike());
        self::assertSame('Something New', $fixture[0]->getProposedDescription());
        self::assertSame('Something New', $fixture[0]->getIsApproved());
        self::assertSame('Something New', $fixture[0]->getSocialMedia());
        self::assertSame('Something New', $fixture[0]->getUser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Commentaire();
        $fixture->setDescription('Value');
        $fixture->setNumberlike('Value');
        $fixture->setNumberdislike('Value');
        $fixture->setProposedDescription('Value');
        $fixture->setIsApproved('Value');
        $fixture->setSocialMedia('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/commentaire/');
        self::assertSame(0, $this->commentaireRepository->count([]));
    }
}
