<?php
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CheckerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h5', 'Anagram');
    }

    public function testCheckAnagram()
    {
        $client = static::createClient();

        $word = 'listen';
        $comparison = 'silent';

        $client->request(
            'POST',
            '/check_anagram',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode(['word' => $word, 'comparison' => $comparison])
        );

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString('{"result":true}', $client->getResponse()->getContent());
    }
}
