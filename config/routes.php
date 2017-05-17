<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 11:54
 */

return [
    'update/([0-9]+)' => 'comment/update/$1',
    'delete/([0-9]+)' => 'comment/delete/$1',
    'create' => 'comment/create',
    'index' => 'comment/index',
    'login' => 'site/login',
    'signup' => 'site/signup',
    'logout' => 'site/logout'
];