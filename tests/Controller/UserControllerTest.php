<?php

namespace App\Tests\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UserControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $userRepository;
    private string $path = '/user/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->userRepository = $this->manager->getRepository(User::class);

        foreach ($this->userRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'user[name]' => 'Testing',
            'user[prenom]' => 'Testing',
            'user[email]' => 'Testing',
            'user[password]' => 'Testing',
            'user[roleUser]' => 'Testing',
            'user[dateNaiss]' => 'Testing',
            'user[phoneNumber]' => 'Testing',
            'user[statut]' => 'Testing',
            'user[diamond]' => 'Testing',
            'user[deleteFlag]' => 'Testing',
            'user[imagesU]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->userRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new User();
        $fixture->setName('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPassword('My Title');
        $fixture->setRoleUser('My Title');
        $fixture->setDateNaiss('My Title');
        $fixture->setPhoneNumber('My Title');
        $fixture->setStatut('My Title');
        $fixture->setDiamond('My Title');
        $fixture->setDeleteFlag('My Title');
        $fixture->setImagesU('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new User();
        $fixture->setName('Value');
        $fixture->setPrenom('Value');
        $fixture->setEmail('Value');
        $fixture->setPassword('Value');
        $fixture->setRoleUser('Value');
        $fixture->setDateNaiss('Value');
        $fixture->setPhoneNumber('Value');
        $fixture->setStatut('Value');
        $fixture->setDiamond('Value');
        $fixture->setDeleteFlag('Value');
        $fixture->setImagesU('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'user[name]' => 'Something New',
            'user[prenom]' => 'Something New',
            'user[email]' => 'Something New',
            'user[password]' => 'Something New',
            'user[roleUser]' => 'Something New',
            'user[dateNaiss]' => 'Something New',
            'user[phoneNumber]' => 'Something New',
            'user[statut]' => 'Something New',
            'user[diamond]' => 'Something New',
            'user[deleteFlag]' => 'Something New',
            'user[imagesU]' => 'Something New',
        ]);

        self::assertResponseRedirects('/user/');

        $fixture = $this->userRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPassword());
        self::assertSame('Something New', $fixture[0]->getRoleUser());
        self::assertSame('Something New', $fixture[0]->getDateNaiss());
        self::assertSame('Something New', $fixture[0]->getPhoneNumber());
        self::assertSame('Something New', $fixture[0]->getStatut());
        self::assertSame('Something New', $fixture[0]->getDiamond());
        self::assertSame('Something New', $fixture[0]->getDeleteFlag());
        self::assertSame('Something New', $fixture[0]->getImagesU());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new User();
        $fixture->setName('Value');
        $fixture->setPrenom('Value');
        $fixture->setEmail('Value');
        $fixture->setPassword('Value');
        $fixture->setRoleUser('Value');
        $fixture->setDateNaiss('Value');
        $fixture->setPhoneNumber('Value');
        $fixture->setStatut('Value');
        $fixture->setDiamond('Value');
        $fixture->setDeleteFlag('Value');
        $fixture->setImagesU('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/user/');
        self::assertSame(0, $this->userRepository->count([]));
    }
}
