<?php

use Symfony\Component\ClassLoader\ApcClassLoader,
    Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';

$apcLoader = new ApcClassLoader('synopsis', $loader);
$loader->unregister();
$apcLoader->register(true);

require_once __DIR__ . '/../app/AppKernel.php';
require_once __DIR__ . '/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call Request::enableHttpMethodParameterOverride() here.
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);