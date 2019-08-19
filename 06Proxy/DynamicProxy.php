<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/8/12 18:20
 */
$obj = null;
$class = new ReflectionClass($obj);
$me = $class->getMethod($name);
$me->invoke();
