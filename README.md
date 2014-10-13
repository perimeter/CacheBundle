Perimeter CacheBundle
=====================

[![Build Status](https://travis-ci.org/perimeter/CacheBundle.svg?branch=develop)](https://travis-ci.org/perimeter/CacheBundle)

A Symfony Bundle that wraps the [memento caching library](https://github.com/perimeter/memento) and provides an extensible interface for integration with the Perimeter API Gateway.

Usage
-----

You can access the `memento` caching library using the service container

```php
// get the cache client
$memento = $container->get('memento.client');
```

Or you can use the perimeter caching service, which implements `Perimeter\CacheBundle\Cache\CacheServiceInterface` in order to be interchangeable with other caching services. 

Prefixes
--------

The `perimeter.cache` service also supports cache prefixes, which can be important when deploying to multiple environments:

*Production config*
```xml
<!-- Resources/config/services_prod.xml -->
<parameter id="perimeter.cache.prefix">prod</parameter>
```

*Beta config*
```xml
<!-- Resources/config/services_beta.xml -->
<parameter id="perimeter.cache.prefix>">beta</parameter>
```

This will ensure that if your cache engine is shared across environments (i.e. beta and prod share memcache or redis instances) the caching does not collide.