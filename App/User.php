<?php

namespace App;
require 'FormData.php';

class User extends FormData {
    public function post($table,$data)
    {
        return $this->set($table,$data);
    }
}