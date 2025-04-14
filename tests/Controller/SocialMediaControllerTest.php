<?php

namespace App\Tests\Controller;

use App\Entity\SocialMedia;
use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SocialMediaControllerTest extends WebTestCase{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $socialMediaRepository;
    private string $path = '/social/media/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->socialMediaRepository = $this->manager->getRepository(SocialMedia::class);

        foreach ($this->socialMediaRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('SocialMedia index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'social_media[titre]' => 'Testing',
            'social_media[contenu]' => 'Testing',
            'social_media[publicationDate]' => 'Testing',
            'social_media[lieu]' => 'Testing',
            'social_media[likee]' => 'Testing',
            'social_media[dislike]' => 'Testing',
            'social_media[imagemedia]' => 'Testing',
            'social_media[user]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->socialMediaRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new SocialMedia();
        $fixture->setTitre('My Title');
        $fixture->setContenu('My Title');
        $fixture->setPublicationDate('My Title');
        $fixture->setLieu('My Title');
        $fixture->setLikee('My Title');
        $fixture->setDislike('My Title');
        $fixture->setImagemedia('My Title');
        $fixture->setUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('SocialMedia');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new SocialMedia();
        $fixture->setTitre('Value');
        $fixture->setContenu('Value');
        $fixture->setPublicationDate('Value');
        $fixture->setLieu('Value');
        $fixture->setLikee('Value');
        $fixture->setDislike('Value');
        $fixture->setImagemedia('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'social_media[titre]' => 'Something New',
            'social_media[contenu]' => 'Something New',
            'social_media[publicationDate]' => 'Something New',
            'social_media[lieu]' => 'Something New',
            'social_media[likee]' => 'Something New',
            'social_media[dislike]' => 'Something New',
            'social_media[imagemedia]' => 'Something New',
            'social_media[user]' => 'Something New',
        ]);

        self::assertResponseRedirects('/social/media/');

        $fixture = $this->socialMediaRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getContenu());
        self::assertSame('Something New', $fixture[0]->getPublicationDate());
        self::assertSame('Something New', $fixture[0]->getLieu());
        self::assertSame('Something New', $fixture[0]->getLikee());
        self::assertSame('Something New', $fixture[0]->getDislike());
        self::assertSame('Something New', $fixture[0]->getImagemedia());
        self::assertSame('Something New', $fixture[0]->getUser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new SocialMedia();
        $fixture->setTitre('Value');
        $fixture->setContenu('Value');
        $fixture->setPublicationDate('Value');
        $fixture->setLieu('Value');
        $fixture->setLikee('Value');
        $fixture->setDislike('Value');
        $fixture->setImagemedia('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/social/media/');
        self::assertSame(0, $this->socialMediaRepository->count([]));
    }
}
