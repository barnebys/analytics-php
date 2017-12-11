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
     * @param array ...$dimensions
     */
    public function __construct(UrlBuilder $urlBuilder, $programId, ...$dimensions)
    {

        $urlBuilder->setProgramId($programId)
                    ->setKind('impression');

        foreach (array_slice($dimensions, 0, 3) as $key => $value) {
            $index = $key + 1;
            $urlBuilder->{"setDimension$index"}($value);
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