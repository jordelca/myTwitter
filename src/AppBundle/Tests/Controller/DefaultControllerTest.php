<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function loginIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/en/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Login', $crawler->filter('ul.form-header')->text());

    }

    public function testLandingPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/en/');

        $this->assertContains('MyTwitter', $crawler->filter('a.navbar-brand')->text());

    }
}
