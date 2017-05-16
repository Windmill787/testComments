<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 13:35
 */

namespace Comments\models;


use Comments\config\DataBase;

class Model
{
    protected $tableName;

    function __construct() {
        if (empty($this->tableName)) {
            $className = explode('\\', get_class($this));
            $this->tableName = lcfirst(array_pop($className));
        }
    }

    /**
     * @param $id integer
     *
     * @return string
     */
    public function find($id) {

        $db = DataBase::getConnection();

        $query = "SELECT * FROM ".$this->tableName." WHERE `id`=".$id;

        $result = $db->query($query)->fetch_assoc();

        return $result;
    }

    public function findAll() {
        $db = DataBase::getConnection();

        $query = "SELECT * FROM ".$this->tableName;

        $result = $db->query($query)->fetch_all();

        return $result;
    }
}