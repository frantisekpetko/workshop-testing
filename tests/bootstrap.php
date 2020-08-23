<?php

//$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';
function autoloader($trida)
{
    if (!file_exists(__DIR__ . '/../../' . $trida . '.php'))
        return false;
    require(__DIR__ . '/../../' . $trida . '.php');
}

spl_autoload_register('autoloader');