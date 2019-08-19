<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/1 17:06
 */
namespace A03;
include "Human.php";
include "HumanFactory.php";
include "MaleFactory.php";
include "FemaleFactory.php";
include "AbstractBlackHuman.php";
include "BlackMaleHuman.php";
include "BlackFemaleHuman.php";


$maleFactory = new MaleFactory();
$blackm = $maleFactory->createBlackHuman();
$blackm->getColor();
$blackm->talk();
$blackm->getSex();

$femaleFacotry = new FemaleFactory();
$blackf = $femaleFacotry->createBlackHuman();
$blackf->getColor();
$blackf->talk();
$blackf->getSex();
