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

    public function testIsPalindrome()
    {
        $client = static::createClient();

        $word = 'anna';

        $client->request(
            'GET',
            sprintf('/palindrome/%s', $word),
        );

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString('{"word":"' . $word . '","isPalindrome":true}', $client->getResponse()->getContent());
    }

    public function testIsAnagram()
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

    public function testIsPangram()
    {
        $client = static::createClient();

        $word = 'The quick brown fox jumps over the lazy dog';

        $client->request(
            'GET',
            sprintf('/pangram/%s', $word),
        );

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString('{"phrase":"' . $word . '","isPangram":true}', $client->getResponse()->getContent());
    }
}
