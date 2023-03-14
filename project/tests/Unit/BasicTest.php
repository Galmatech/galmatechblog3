<?php

namespace App\tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class BasicTest extends WebTestCase
{
    public function testFunctionalEnvironnementIsOk(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/');
        $this->assertResponseIsSuccessful();
    }
}
