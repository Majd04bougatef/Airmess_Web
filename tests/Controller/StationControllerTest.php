<?php

namespace App\Tests\Controller;

use App\Entity\Station;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class StationControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $stationRepository;
    private string $path = '/station/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->stationRepository = $this->manager->getRepository(Station::class);

        foreach ($this->stationRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Station index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'station[nom]' => 'Testing',
            'station[latitude]' => 'Testing',
            'station[longitude]' => 'Testing',
            'station[capacite]' => 'Testing',
            'station[nombreVelo]' => 'Testing',
            'station[typeVelo]' => 'Testing',
            'station[prixHeure]' => 'Testing',
            'station[pays]' => 'Testing',
            'station[user]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->stationRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Station();
        $fixture->setNom('My Title');
        $fixture->setLatitude('My Title');
        $fixture->setLongitude('My Title');
        $fixture->setCapacite('My Title');
        $fixture->setNombreVelo('My Title');
        $fixture->setTypeVelo('My Title');
        $fixture->setPrixHeure('My Title');
        $fixture->setPays('My Title');
        $fixture->setUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Station');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Station();
        $fixture->setNom('Value');
        $fixture->setLatitude('Value');
        $fixture->setLongitude('Value');
        $fixture->setCapacite('Value');
        $fixture->setNombreVelo('Value');
        $fixture->setTypeVelo('Value');
        $fixture->setPrixHeure('Value');
        $fixture->setPays('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'station[nom]' => 'Something New',
            'station[latitude]' => 'Something New',
            'station[longitude]' => 'Something New',
            'station[capacite]' => 'Something New',
            'station[nombreVelo]' => 'Something New',
            'station[typeVelo]' => 'Something New',
            'station[prixHeure]' => 'Something New',
            'station[pays]' => 'Something New',
            'station[user]' => 'Something New',
        ]);

        self::assertResponseRedirects('/station/');

        $fixture = $this->stationRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getLatitude());
        self::assertSame('Something New', $fixture[0]->getLongitude());
        self::assertSame('Something New', $fixture[0]->getCapacite());
        self::assertSame('Something New', $fixture[0]->getNombreVelo());
        self::assertSame('Something New', $fixture[0]->getTypeVelo());
        self::assertSame('Something New', $fixture[0]->getPrixHeure());
        self::assertSame('Something New', $fixture[0]->getPays());
        self::assertSame('Something New', $fixture[0]->getUser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Station();
        $fixture->setNom('Value');
        $fixture->setLatitude('Value');
        $fixture->setLongitude('Value');
        $fixture->setCapacite('Value');
        $fixture->setNombreVelo('Value');
        $fixture->setTypeVelo('Value');
        $fixture->setPrixHeure('Value');
        $fixture->setPays('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/station/');
        self::assertSame(0, $this->stationRepository->count([]));
    }
}
