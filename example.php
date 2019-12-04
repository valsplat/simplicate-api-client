<?php

require 'vendor/autoload.php';

$connection = new \Valsplat\Simplicate\Connection();
$connection->setApiUrl('https://YOURDOMAIN.simplicate.nl/api/v2');
$connection->setAccountKey('KEY');
$connection->setAccountSecret('SECRET');

$simplicate = new \Valsplat\Simplicate\Simplicate($connection);

// Example: get list of projects
$projects = $simplicate->project()->list();
var_dump($projects);
