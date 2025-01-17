<?php

require __DIR__ . "/../vendor/autoload.php";

use HiFolks\Milk\Here\RestApi\Weather;


Dotenv\Dotenv::createImmutable(__DIR__ . "/../")->load();

$hereApiKey = $_ENV['HERE_API_KEY'];

$hereAppId = $_ENV['HERE_APP_ID'];
$hereAppCode = $_ENV['HERE_APP_CODE'];


function print_row($item, $key)
{
    echo $key + 1 . " " . $item->id . " " . $item->owner . " " . $item->title . "\n";
}

$w = Weather::instance();


$jsonWeather = $w
    //->setApiKey($hereApiKey)
        ->setAppIdAppCode($hereAppId, $hereAppCode)
                ->productAlerts()
                ->name("Berlin")
                ->get();

$w->debug();

var_dump($jsonWeather->getData());
var_dump($jsonWeather->isError());
var_dump($jsonWeather->getErrorMessage());
var_dump($jsonWeather->getDataAsJsonString());
