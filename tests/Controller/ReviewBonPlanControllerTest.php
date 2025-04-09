<?php

namespace App\Tests\Controller;

use App\Entity\ReviewBonPlan;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ReviewBonPlanControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $reviewBonPlanRepository;
    private string $path = '/review/bon/plan/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->reviewBonPlanRepository = $this->manager->getRepository(ReviewBonPlan::class);

        foreach ($this->reviewBonPlanRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ReviewBonPlan index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'review_bon_plan[id_U]' => 'Testing',
            'review_bon_plan[commente]' => 'Testing',
            'review_bon_plan[rating]' => 'Testing',
            'review_bon_plan[bonPlan]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->reviewBonPlanRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ReviewBonPlan();
        $fixture->setId_U('My Title');
        $fixture->setCommente('My Title');
        $fixture->setRating('My Title');
        $fixture->setBonPlan('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ReviewBonPlan');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ReviewBonPlan();
        $fixture->setId_U('Value');
        $fixture->setCommente('Value');
        $fixture->setRating('Value');
        $fixture->setBonPlan('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'review_bon_plan[id_U]' => 'Something New',
            'review_bon_plan[commente]' => 'Something New',
            'review_bon_plan[rating]' => 'Something New',
            'review_bon_plan[bonPlan]' => 'Something New',
        ]);

        self::assertResponseRedirects('/review/bon/plan/');

        $fixture = $this->reviewBonPlanRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getId_U());
        self::assertSame('Something New', $fixture[0]->getCommente());
        self::assertSame('Something New', $fixture[0]->getRating());
        self::assertSame('Something New', $fixture[0]->getBonPlan());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ReviewBonPlan();
        $fixture->setId_U('Value');
        $fixture->setCommente('Value');
        $fixture->setRating('Value');
        $fixture->setBonPlan('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/review/bon/plan/');
        self::assertSame(0, $this->reviewBonPlanRepository->count([]));
    }
}
