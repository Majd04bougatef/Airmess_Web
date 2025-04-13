<?php

namespace App\Tests\Controller;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MessageControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $messageRepository;
    private string $path = '/message/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->messageRepository = $this->manager->getRepository(Message::class);

        foreach ($this->messageRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Message index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'message[content]' => 'Testing',
            'message[dateM]' => 'Testing',
            'message[sender]' => 'Testing',
            'message[receiver]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->messageRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Message();
        $fixture->setContent('My Title');
        $fixture->setDateM('My Title');
        $fixture->setSender('My Title');
        $fixture->setReceiver('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Message');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Message();
        $fixture->setContent('Value');
        $fixture->setDateM('Value');
        $fixture->setSender('Value');
        $fixture->setReceiver('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'message[content]' => 'Something New',
            'message[dateM]' => 'Something New',
            'message[sender]' => 'Something New',
            'message[receiver]' => 'Something New',
        ]);

        self::assertResponseRedirects('/message/');

        $fixture = $this->messageRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getContent());
        self::assertSame('Something New', $fixture[0]->getDateM());
        self::assertSame('Something New', $fixture[0]->getSender());
        self::assertSame('Something New', $fixture[0]->getReceiver());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Message();
        $fixture->setContent('Value');
        $fixture->setDateM('Value');
        $fixture->setSender('Value');
        $fixture->setReceiver('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/message/');
        self::assertSame(0, $this->messageRepository->count([]));
    }
}
