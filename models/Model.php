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
     * @return array
     */
    public function findById($id) {

        $db = DataBase::getConnection();

        $query = "SELECT * FROM $this->tableName 
                  WHERE `id`=".$id;

        $result = $db->query($query)->fetch_assoc();

        return $result;
    }

    /**
     * @param $data array
     *
     * @return array
     */
    public function find($data) {

        $db = DataBase::getConnection();

        $key = array_keys($data);

        $value = array_values($data);

        $query = "SELECT * FROM $this->tableName 
                  WHERE " . implode(', ' , $key) . " = 
                  '". implode("', '" , $value) . "'";

        $result = $db->query($query)->fetch_assoc();

        return $result;
    }

    /**
     * @return array
     */
    public function findAll() {

        $db = DataBase::getConnection();

        $query = "SELECT * FROM $this->tableName";

        $result = $db->query($query)->fetch_all();

        return $result;
    }

    public function insert($data) {

        $db = DataBase::getConnection();

        $key = array_keys($data);

        $value = array_values($data);

        $query = "INSERT INTO $this->tableName (" . implode(', ' , $key) . ") 
                    VALUES ('". implode("', '" , $value) . "')";

        $result = $db->query($query);

        return $result;
    }
}