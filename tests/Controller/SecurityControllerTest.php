<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function loginUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['_username' => 'admin', '_password' => 'admin']);
    }

    public function testLogin()
    {
        $this->loginUser();
        $this->client->request('GET', '/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithBadCredentials()
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['_username' => 'unknown', '_password' => 'wrong']);

        static::assertResponseRedirects('http://localhost/login');
        //$this->assertTrue(preg_match('#\/login#', $client->getResponse()->headers->get('Location')));
        $this->client->followRedirect();

        static::assertSame(200, $this->client->getResponse()->getStatusCode());
        static::assertSelectorExists('.alert.alert-danger');
        static::assertSelectorTextSame('div.alert', "Invalid credentials.");
    }

    public function testLogOut()
    {
        $this->loginUser();
        $crawler = $this->client->request('GET', '/');
        $crawler->selectLink('Se déconnecter')->link();
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
