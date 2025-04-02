<?php

namespace App\Tests\Controller;

use App\Entity\ReservationTransport;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ReservationTransportControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $reservationTransportRepository;
    private string $path = '/reservation/transport/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->reservationTransportRepository = $this->manager->getRepository(ReservationTransport::class);

        foreach ($this->reservationTransportRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ReservationTransport index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'reservation_transport[dateRes]' => 'Testing',
            'reservation_transport[dateFin]' => 'Testing',
            'reservation_transport[prix]' => 'Testing',
            'reservation_transport[statut]' => 'Testing',
            'reservation_transport[reference]' => 'Testing',
            'reservation_transport[nombreVelo]' => 'Testing',
            'reservation_transport[user]' => 'Testing',
            'reservation_transport[station]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->reservationTransportRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ReservationTransport();
        $fixture->setDateRes('My Title');
        $fixture->setDateFin('My Title');
        $fixture->setPrix('My Title');
        $fixture->setStatut('My Title');
        $fixture->setReference('My Title');
        $fixture->setNombreVelo('My Title');
        $fixture->setUser('My Title');
        $fixture->setStation('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ReservationTransport');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ReservationTransport();
        $fixture->setDateRes('Value');
        $fixture->setDateFin('Value');
        $fixture->setPrix('Value');
        $fixture->setStatut('Value');
        $fixture->setReference('Value');
        $fixture->setNombreVelo('Value');
        $fixture->setUser('Value');
        $fixture->setStation('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'reservation_transport[dateRes]' => 'Something New',
            'reservation_transport[dateFin]' => 'Something New',
            'reservation_transport[prix]' => 'Something New',
            'reservation_transport[statut]' => 'Something New',
            'reservation_transport[reference]' => 'Something New',
            'reservation_transport[nombreVelo]' => 'Something New',
            'reservation_transport[user]' => 'Something New',
            'reservation_transport[station]' => 'Something New',
        ]);

        self::assertResponseRedirects('/reservation/transport/');

        $fixture = $this->reservationTransportRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getDateRes());
        self::assertSame('Something New', $fixture[0]->getDateFin());
        self::assertSame('Something New', $fixture[0]->getPrix());
        self::assertSame('Something New', $fixture[0]->getStatut());
        self::assertSame('Something New', $fixture[0]->getReference());
        self::assertSame('Something New', $fixture[0]->getNombreVelo());
        self::assertSame('Something New', $fixture[0]->getUser());
        self::assertSame('Something New', $fixture[0]->getStation());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ReservationTransport();
        $fixture->setDateRes('Value');
        $fixture->setDateFin('Value');
        $fixture->setPrix('Value');
        $fixture->setStatut('Value');
        $fixture->setReference('Value');
        $fixture->setNombreVelo('Value');
        $fixture->setUser('Value');
        $fixture->setStation('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/reservation/transport/');
        self::assertSame(0, $this->reservationTransportRepository->count([]));
    }
}
