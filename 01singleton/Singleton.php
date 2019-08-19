<?php
/**
 * Created by wking.
 * @author: wking <1974655618@qq.com>
 * @date: 2019/7/29 17:39
 */

class Singleton
{
    private static $instance;

    private function __construct()
    {
        var_dump('this is private construct function');
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if(!self::$instance instanceof Singleton){
            self::$instance = new self();
        }
        return self::$instance;
    }

}