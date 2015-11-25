<?php
namespace AdvertBundle\Tests\Manager;

use AdvertBundle\Manager\Calculator;

class AdvertTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $manager = new Calculator();
        $sum = $manager->add(54, 6);


        $this->assertEquals(60, $sum);
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