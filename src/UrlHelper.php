<?php

namespace Barnebys\Analytics;

/**
 * Class UrlHelper
 * @package Barnebys\Analytics
 */
final class UrlHelper
{
    const VERSION = '1.0';

    private $params;
    private $secret;

    public function __construct($params, $secret)
    {
        $this->params = $params;
        $this->secret = $secret;
    }

    private function getQuery()
    {
        $query = '/?' . http_build_query($this->params);

        return $query . "&s=" . md5($this->secret . $query);
    }

    public function __toString()
    {
        return $this->getQuery();
    }

}