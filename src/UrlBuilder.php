<?php

namespace Barnebys\Analytics;

use Barnebys\Analytics\UrlHelper;

/**
 * Class UrlBuilder
 * @package Barnebys\Analytics
 */
final class UrlBuilder
{
    const VERSION = '1.0';

    private $domain;
    private $secret;

    private $params = [];

    public function __construct($domain, $secret)
    {
        $this->domain = $domain;
        $this->secret = $secret;
    }

    public function setProgramId($id)
    {
        $this->params['p'] = $id;

        return $this;
    }

    public function setKind($kind)
    {
        $this->params['k'] = $kind;

        return $this;
    }

    public function setURL($url)
    {
        $this->params['url'] = $url;

        return $this;
    }

    public function setIsAffiliate($bool)
    {
        $this->params['a'] = (bool) $bool;

        return $this;
    }

    public function setDimension1($value)
    {
        $this->setDimension(1, $value);

        return $this;
    }

    public function setDimension2($value)
    {
        $this->setDimension(2, $value);

        return $this;
    }

    public function setDimension3($value)
    {
        $this->setDimension(3, $value);

        return $this;
    }

    public function createURL()
    {
        $query = new UrlHelper($this->params, $this->secret);

        return 'https://' . $this->domain . $query;
    }

    private function setDimension($index, $value)
    {
        $this->params["d$index"] = $value;
    }

}