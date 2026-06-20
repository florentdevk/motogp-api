<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class RiderTest extends WebTestCase
{
    public function testGetRidersReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/riders');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }

    public function testGetRidersReturns22Riders(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/riders');

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame(22, $data['totalItems']);
    }

    public function testGetSingleRiderReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/riders/1');

        $this->assertResponseIsSuccessful();
    }

    public function testGetNonExistentRiderReturns404(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/riders/9999');

        $this->assertResponseStatusCodeSame(404);
    }
}