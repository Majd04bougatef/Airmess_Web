<?php

namespace App\Tests\Controller;

use App\Entity\Expense;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ExpenseControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $expenseRepository;
    private string $path = '/expense/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->expenseRepository = $this->manager->getRepository(Expense::class);

        foreach ($this->expenseRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Expense index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'expense[amount]' => 'Testing',
            'expense[description]' => 'Testing',
            'expense[category]' => 'Testing',
            'expense[dateE]' => 'Testing',
            'expense[nameEx]' => 'Testing',
            'expense[imagedepense]' => 'Testing',
            'expense[user]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->expenseRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Expense();
        $fixture->setAmount('My Title');
        $fixture->setDescription('My Title');
        $fixture->setCategory('My Title');
        $fixture->setDateE('My Title');
        $fixture->setNameEx('My Title');
        $fixture->setImagedepense('My Title');
        $fixture->setUser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Expense');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Expense();
        $fixture->setAmount('Value');
        $fixture->setDescription('Value');
        $fixture->setCategory('Value');
        $fixture->setDateE('Value');
        $fixture->setNameEx('Value');
        $fixture->setImagedepense('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'expense[amount]' => 'Something New',
            'expense[description]' => 'Something New',
            'expense[category]' => 'Something New',
            'expense[dateE]' => 'Something New',
            'expense[nameEx]' => 'Something New',
            'expense[imagedepense]' => 'Something New',
            'expense[user]' => 'Something New',
        ]);

        self::assertResponseRedirects('/expense/');

        $fixture = $this->expenseRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getAmount());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getCategory());
        self::assertSame('Something New', $fixture[0]->getDateE());
        self::assertSame('Something New', $fixture[0]->getNameEx());
        self::assertSame('Something New', $fixture[0]->getImagedepense());
        self::assertSame('Something New', $fixture[0]->getUser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Expense();
        $fixture->setAmount('Value');
        $fixture->setDescription('Value');
        $fixture->setCategory('Value');
        $fixture->setDateE('Value');
        $fixture->setNameEx('Value');
        $fixture->setImagedepense('Value');
        $fixture->setUser('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/expense/');
        self::assertSame(0, $this->expenseRepository->count([]));
    }
}
