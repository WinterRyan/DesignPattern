<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/2 9:58
 */
namespace A04;

include "HummerModel.php";
include "H1Hummer.php";
include "H2Hummer.php";

$H1 = new H1Hummer();
$H1->run();

var_dump('===========================');

$H2 = new H2Hummer();
$H2->run();