<?php

$app = new Silex\Application();
$app->register(new Silex\Provider\DoctrineServiceProvider());
return $app;
