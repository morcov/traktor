<?php
namespace AdvertBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdvertTest extends WebTestCase
{
    public function testAdd()
    {
        $params = [
            'advert_bundle_advert_type[make]' => '5631d45be346ae312b8b456a',
            'advert_bundle_advert_type[model]' => '5631d45be346ae312b8b4567',
            'advert_bundle_advert_type[year]' => '2010',
            'advert_bundle_advert_type[price]' => '40000',
            'advert_bundle_advert_type[description]' => 'huiniy',
        ];

        $client = static::createClient();
        $client->followRedirects();

        $crawler = $client->request('GET', '/advert/add');
        $form = $crawler->selectButton('app_bundle_advert_save')->form($params);

        $crawler = $client->submit($form);
        $count = $crawler->filter('html:contains("Detail")')->count();

        $this->assertEquals(1, $count);
    }

/**
    $params = [
        'advert_bundle_advert_type[make]' => '5631d45be346ae312b8b456a',
        'advert_bundle_advert_type[model]' => '5631d45be346ae312b8b4567',
        'advert_bundle_advert_type[year]' => '2010',
        'advert_bundle_advert_type[price]' => '40000',
        'advert_bundle_advert_type[description]' => 'huiniy',
    ];
 */

}