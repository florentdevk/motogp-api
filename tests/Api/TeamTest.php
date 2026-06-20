<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class TeamTest extends WebTestCase
{
    public function testGetTeamsReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/teams');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }

    public function testGetTeamsReturns11Teams(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/teams');

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame(11, $data['totalItems']);
    }

    public function testGetSingleTeamReturns200(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/teams/1');

        $this->assertResponseIsSuccessful();
    }

    public function testGetNonExistentTeamReturns404(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/teams/9999');

        $this->assertResponseStatusCodeSame(404);
    }
}
