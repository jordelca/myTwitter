<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testRootRedirect()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(301, $client->getResponse()->getStatusCode());
    }

    public function testLanguageRedirect()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/en');
        $this->assertEquals(301, $client->getResponse()->getStatusCode());

    }

    public function testLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/en/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    public function testLoginForm(){
        $client = static::createClient();

        $client->followRedirects();
        $crawler = $client->request('GET', '/en/register');


        $form = $crawler->selectButton('Register')->form();
        $form["fos_user_registration_form[username]"] = "testuser25";
        $form["fos_user_registration_form[email]"] = "testuser25@gmail.com";
        $form["fos_user_registration_form[plainPassword][password]"] = "password";
        $form["fos_user_registration_form[plainPassword][confirm]"] = "password";
        $form["fos_user_registration_form[terms]"] = "1";

        $crawler = $client->submit($form);

        $crawler = $client->request('GET', '/en/login');

        $form = $crawler->selectButton('Log in')->form();
        $form["_username"] = "testuser25";
        $form["_password"] = "password";


        $crawler = $client->submit($form);

        $this->assertContains('Welcome', $crawler->filter('.pull-right.nav.navbar-nav li a')->text());


    }
}
