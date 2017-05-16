<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 11:49
 */

require_once 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

Comments\config\DataBase::getConnection();

(new \Comments\components\Router())->run();
