<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 16:30
 */
namespace A05;

include "Director.php";
include "CarBuilder.php";
include "BenzBuilder.php";
include "BMWBuilder.php";
include "CarModel.php";
include "BenzModel.php";
include "BMWModel.php";

$director = new Director();
for($i=0; $i<3; $i++){
    $director->getABenzModel()->run();
    var_dump('------------');
}

for ($i=0; $i<3; $i++){
    $director->getBBenzModel()->run();
    var_dump('`````');
}

var_dump("=====================");

for ($i=0; $i<5; $i++){
    $director->getABMWModel()->run();
    var_dump('------------');
}