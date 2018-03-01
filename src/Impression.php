<?php

namespace Barnebys\Analytics;

/**
 * Class UrlHelper
 * @package Barnebys\Analytics
 */
final class Impression
{
    const VERSION = '1.0';

    private $url = '';

    /**
     * Impression constructor.
     * @param UrlBuilder $urlBuilder
     * @param $programId
     * @param null $dimension1
     * @param null $dimension2
     * @param null $dimension3
     * @param null $dimension4
     * @param null $dimension5
     */
    public function __construct(UrlBuilder $urlBuilder, $programId, $dimension1 = null, $dimension2 = null, $dimension3 = null, $dimension4 = null, $dimension5 = null)
    {

        $urlBuilder->setProgramId($programId)
                    ->setKind('impression');

        for($i=1;$i<=5;$i++) {
            $urlBuilder->{"setDimension$i"}(${"dimension$i"});
        }

        $this->url = $urlBuilder->createURL();
    }

    /**
     * @param array $class
     */
    public function image(array $class = [])
    {
        echo sprintf(
            '<img data-src="%s" class="%s" />',
            $this->getURL(),
            implode(" ", $class)
        );
    }

    /**
     * @return string
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getURL();
    }

}