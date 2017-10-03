<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
use MainBundle\Middlewares\CorsMW;

$app->add(CorsMW::class);