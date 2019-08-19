<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/7/29 18:30
 */

include 'HumanFactory.php';

$yinyanglu = new HumanFactory();

$white = $yinyanglu->createHuman('WhiteHuman');
$white->getColor();
$white->talk();

$black = $yinyanglu->createHuman('BlackHuman');
$black->getColor();
$black->talk();