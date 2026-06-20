<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CircuitTest extends WebTestCase
{
    public function testGetCircuitsReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/circuits');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }

    public function testGetCircuitsReturns22Circuits(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/circuits');

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame(22, $data['totalItems']);
    }

    public function testGetSingleCircuitReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/circuits/1');

        $this->assertResponseIsSuccessful();
    }

    public function testGetNonExistentCircuitReturns404(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/circuits/9999');

        $this->assertResponseStatusCodeSame(404);
    }
}