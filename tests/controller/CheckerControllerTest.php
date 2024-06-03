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
            'GET',
            sprintf('/anagram/%s/%s', $word, $comparison),
        );

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString('{"word":"' . $word . '","comparison":"' . $comparison . '","isAnagram":true}', $client->getResponse()->getContent());
    }
}
