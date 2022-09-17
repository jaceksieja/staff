<?php

namespace App\Tests\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationController extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();

        $content = [
            'login' => 'TeSt',
            'password' => 'strongPassword',
            'position' => 'developer',
            'phoneNumber' => '+48 123 456 789'
        ];

        $crawler = $client->request(method: 'POST', uri: '/sign-up', server: ['CONTENT_TYPE' => 'application/json'], content: json_encode($content));

        self::assertResponseIsSuccessful();
    }
}
