<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class RaceTest extends WebTestCase
{
    public function testGetRacesReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/races');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }

    public function testGetRacesReturns22Races(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/races');

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame(22, $data['totalItems']);
    }

    public function testGetSingleRaceReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/races/1');

        $this->assertResponseIsSuccessful();
    }

    public function testGetNonExistentRaceReturns404(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/races/9999');

        $this->assertResponseStatusCodeSame(404);
    }
}