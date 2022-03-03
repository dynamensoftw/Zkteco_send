<?php

require ('vendor/autoload.php');
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

date_default_timezone_set($_ENV['ZONA_HORARIA']);