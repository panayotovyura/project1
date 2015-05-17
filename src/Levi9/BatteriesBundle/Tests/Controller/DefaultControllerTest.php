<?php

namespace Levi9\BatteriesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @dataProvider addProvider
     */
    public function testAdd($type, $count)
    {
        $client = static::createClient();

        $crawler = $client->request(Request::METHOD_GET, '/add');
        $form = $crawler->selectButton('levi9_batteriesbundle_batteries[save]')->form();

        $form['levi9_batteriesbundle_batteries[type]'] = $type;
        $form['levi9_batteriesbundle_batteries[count]'] = $count;
        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect('/'));
    }

    public function addProvider()
    {
        return [
            ['AA', 4],
            ['AAA', 3],
            ['AA', 1],
        ];
    }

    public function testStatistics()
    {
        $client = static::createClient();

        $crawler = $client->request(Request::METHOD_GET, '/');

        $this->assertEquals(
            $crawler->filter('tbody tr')->count(),
            2
        );

        $this->assertEquals(
            $crawler->filter('td:contains("AA")')->siblings()->text(),
            5
        );

        $this->assertEquals(
            $crawler->filter('td:contains("AAA")')->siblings()->text(),
            3
        );
    }
}
