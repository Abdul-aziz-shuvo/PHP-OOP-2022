<?php
namespace App;
use PDO;
require 'Database.php';
class FormData  extends  Database {
    public function set($table,$datas) {
       return $this->store($table,$datas);
    }

    public function find($id){
        $user = $this->instance->query("SELECT * FROM `user` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
        return $user;
    }


}