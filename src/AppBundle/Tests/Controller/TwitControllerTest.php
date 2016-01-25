<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Twit;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testCountTwitMessage()
    {
        $twit = new Twit();
        $twit->setMessage("This twit has 27 characters");
        $this->assertEquals($twit->countTwitCharacters(), 27);
    }

}
