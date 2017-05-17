<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 11:48
 */

namespace Comments\config;

class DataBase
{
    protected static $instance;

    public static function getConnection()
    {
        if (!isset(static::$instance)) {
            session_start();
            $params = include_once 'params-local.php';
            return static::$instance = new \mysqli(
                $params['host'],
                $params['username'],
                $params['passwd'],
                $params['dbname']
            );
        }
        return static::$instance;
    }

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }
}