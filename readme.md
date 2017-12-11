[![Latest Stable Version](https://poser.pugx.org/barnebys/analytics-php/v/stable)](https://packagist.org/packages/barnebys/analytics-php)
[![Build Status](https://travis-ci.org/barnebys/barnebys-analytics-php.svg?branch=master)](https://travis-ci.org/barnebys/barnebys-analytics-php)
[![Coverage Status](https://coveralls.io/repos/github/barnebys/barnebys-analytics-php/badge.svg?branch=master)](https://coveralls.io/github/barnebys/https://travis-ci.org/barnebys/barnebys-analytics-php?branch=master)


# Barnebys Analytics

This is an helper for PHP to build tracking URL for Barnebys Analytics  with ease.

## Track clicks

## Track leads

## Impressions

Generate the URL from PHP and use a lazy loader that loads the tracking pixel 
when visible in the browser window. If you do not have a compatible lazy loader we 
recommend using this [lazy loader](https://github.com/verlok/lazyload) which is written in vanilla js. 

### Generating impression URL

```
// Create the URL Builder with your tracking domain & secret
$urlBuilder = new UrlBuilder('analytics.yourdomain.com', 'test');

// Create the impression passing on UrlBuilder, program id and optional dimensions 1-3
$impression = new Impression($urlBuilder, '123', 'a', 'b', 'c');

// Get the URL for the tracking pixel 
$url = $impression->getURL();

// Or by using the magic function toString
echo $impression;

// Or output image tag for lazy load
$impression->image();

```


