<?php

use Bangdinhnfq\Unlock\Application;
use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\NotFoundController;

require 'vendor/autoload.php';

$application = new Application(
    new HomeController(),
    new NotFoundController()
);

$application->start();
