<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/7/29 18:27
 */

abstract class AbstractHumanFactory
{
    public abstract function createHuman($className);
}