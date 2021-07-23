<?php

namespace App\Tests\Controller;

use App\DataFixtures\AppFixtures;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    use FixturesTrait;

    private $client;

    private $fixtures;

    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->login = new UserControllerTest();
        $this->fixtures = $this->loadFixtures([
            AppFixtures::class
        ]);
    }

    public function testIndex()
    {
        $this->client->request('GET', '/');
        static::assertSame(302, $this->client->getResponse()->getStatusCode());
        //static::assertResponseRedirects('/login');
        $this->client->followRedirect();
        static::assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function loginUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['username' => 'admin', 'password' => 'admin']);
    }
}
