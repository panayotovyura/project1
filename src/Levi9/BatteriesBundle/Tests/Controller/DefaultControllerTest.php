<?php

namespace Levi9\BatteriesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerTest extends WebTestCase
{
    // todo: test should be able to run multiple times. In your case it will work only first time.

    /**
     * @dataProvider addProvider
     *
     */
    public function testAdd($type, $count)
    {
        $client = static::createClient();

        $crawler = $client->request(Request::METHOD_GET, '/add');
        $form = $crawler->selectButton('levi9_batteriesbundle_batteries[save]')->form();

        // todo: use short selectors (e.g. type/count) but not full ones. Instead of one relation your have two -
        // field name and form name.
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

    // todo: tests should be independent from each other. create needed data (preconditions) in test itself.
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
