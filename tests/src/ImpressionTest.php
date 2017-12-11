<?php

namespace Barnebys\Tests;

use Barnebys\Analytics\Impression;
use Barnebys\Analytics\UrlBuilder;

class ImpressionTest extends TestCase
{
    /**
     * @var \Barnebys\Analytics\UrlBuilder
     */
    private $urlBuilder;

    public function setUp()
    {
        $this->urlBuilder = new UrlBuilder('analytics.barnebys.sh', 'test');
    }

    public function testImpressionURL()
    {

        $url = new Impression($this->urlBuilder, '123', 'a', 'b', 'c');
        $expected = 'https://analytics.barnebys.sh/?p=123&k=impression&d1=a&d2=b&d3=c&s=68e84e5130b4af788009729463101c8c';

        $this->assertEquals($expected, $url);

    }

    public function testImpressionImage()
    {

        $impression = new Impression($this->urlBuilder, '123', 'a', 'b', 'c');

        ob_start();
        $impression->image();
        $image = ob_get_clean();

        $expected = '<img data-src="https://analytics.barnebys.sh/?p=123&k=impression&d1=a&d2=b&d3=c&s=68e84e5130b4af788009729463101c8c" class="" />';

        $this->assertEquals($expected, $image);

    }

    public function testImpressionImageWithClasses()
    {

        $impression = new Impression($this->urlBuilder, '123', 'a', 'b', 'c');

        ob_start();
        $impression->image(['impression', 'test']);
        $image = ob_get_clean();

        $expected = '<img data-src="https://analytics.barnebys.sh/?p=123&k=impression&d1=a&d2=b&d3=c&s=68e84e5130b4af788009729463101c8c" class="impression test" />';

        $this->assertEquals($expected, $image);

    }


}