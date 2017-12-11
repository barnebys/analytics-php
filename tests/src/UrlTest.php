<?php

namespace Barnebys\Tests;

use Barnebys\Analytics\Impression;
use Barnebys\Analytics\UrlBuilder;

class UrlTest extends TestCase
{
    /**
     * @var \Barnebys\Analytics\UrlBuilder
     */
    private $urlBuilder;

    public function setUp()
    {
        $this->urlBuilder = new UrlBuilder('analytics.barnebys.sh', 'test');
    }

    public function testClickURL()
    {

        $urlBuilder = $this->urlBuilder;
        $urlBuilder
            ->setProgramId(123)
            ->setKind('click-test')
            ->setURL('http://www.barnebys.com/')
            ->setDimension1('a')
            ->setDimension2('b')
            ->setDimension3('c');

        $url = $urlBuilder->createURL();
        $expected = 'https://analytics.barnebys.sh/?p=123&k=click-test&url=http%3A%2F%2Fwww.barnebys.com%2F&d1=a&d2=b&d3=c&s=3ea175e5980c6f1f13a46e7aade1b622';

        $this->assertEquals($expected, $url);
    }


}