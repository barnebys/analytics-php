[![Latest Stable Version](https://poser.pugx.org/barnebys/analytics-php/v/stable)](https://packagist.org/packages/barnebys/analytics-php)
[![Build Status](https://travis-ci.org/barnebys/barnebys-analytics-php.svg?branch=master)](https://travis-ci.org/barnebys/barnebys-analytics-php)
[![Coverage Status](https://coveralls.io/repos/github/barnebys/barnebys-analytics-php/badge.svg?branch=master)](https://coveralls.io/github/barnebys/https://travis-ci.org/barnebys/barnebys-analytics-php?branch=master)


# Barnebys Analytics

This is an helper for PHP to build tracking URL for [Barnebys Analytics](https://github.com/barnebys/barnebys-analytics) with ease.

## Track clicks

```
// Create the URL Builder with your tracking domain & secret
$urlBuilder = new UrlBuilder('analytics.yourdomain.com', 'test');
$urlBuilder
    ->setProgramId(123)
    ->setKind('click')
    ->setURL('http://www.someurl.com/')
    ->setDimension1('a')
    ->setDimension2('b')
    ->setDimension3('c');

// Get the signed tracking URL
$url = $urlBuilder->createURL();
```

## Track leads

```
$urlBuilder = new UrlBuilder('analytics.barnebys.sh', 'test');
$urlBuilder
    ->setProgramId(123)
    ...
    ->isAffiliate();
``` 

## Impressions

Generate the URL from PHP and use a lazy loader that loads the tracking pixel 
when visible in the browser window. If you do not have a compatible lazy loader we 
recommend using this [lazy loader](https://github.com/verlok/lazyload) which is written in vanilla js. 


For most compatibility - place the script below before your `</body>` tag.

```
<script type="text/javascript">
    (function(w, d){
        var b = d.getElementsByTagName('body')[0];
        var s = d.createElement("script"); s.async = true;
        var v = !("IntersectionObserver" in w) ? "8.5.2" : "10.3.5";
        s.src = "https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/" + v + "/lazyload.min.js";
        w.lazyLoadOptions = {
            threshold: 0
        };
        b.appendChild(s);
    }(window, document));
</script>
```

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


