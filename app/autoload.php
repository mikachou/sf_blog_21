<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__.'/../vendor/autoload.php';

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->add('', __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs');
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

AnnotationRegistry::registerFile(
    __DIR__.'/../vendor/doctrine/mongodb-odm/lib/Doctrine/ODM/MongoDB/Mapping/Annotations/DoctrineAnnotations.php'
);

$loader->register(array(
    'Admingenerator'    => array(__DIR__.'/../src', __DIR__.'/../vendor/bundles'),
));

$loader->register(array(
    'Knp'       => __DIR__.'/../vendor/bundles',
    'Knp\\Menu'  => __DIR__.'/../vendor/KnpMenu/src',
));

$loader->register(array(
    'Stof'  => __DIR__.'/../vendor/bundles',
    'Gedmo' => __DIR__.'/../vendor/gedmo-doctrine-extensions/lib',
));

$loader->register(array(
    'Stfalcon' => __DIR__.'/../vendor/bundles',
));

return $loader;
