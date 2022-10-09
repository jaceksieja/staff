<?php

namespace App\Tests\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Infrastructure\Controller\RegistrationController
 */
class RegistrationControllerTest extends WebTestCase
{
    public function testCreateUserSuccessfully(): void
    {
        $client = static::createClient();

        $content = [
            'login' => 'TeSt',
            'password' => 'Zaq1@wsx',
            'position' => 'developer',
            'phoneNumber' => '+48 123 456 789',
        ];

        $client->jsonRequest(method: 'POST', uri: '/sign-up', parameters: $content);

        self::assertResponseIsSuccessful();
    }

    public function testCreateUserNotSuccessfully(): void
    {
        $client = static::createClient();

        $content = [
            'login' => 'TeSt',
            'password' => 'Zaq1@wsx',
            'position' => 'CEO',
            'phoneNumber' => '+48 123 456 789',
        ];

        $client->jsonRequest(method: 'POST', uri: '/sign-up', parameters: $content);

        self::assertEquals(
            '{"position":[["position is not allowed"]]}',
            $client->getResponse()->getContent()
        );
    }
}
