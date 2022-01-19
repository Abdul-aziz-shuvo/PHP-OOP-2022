<?php

namespace App;

use PDO;
use PDOException;

class Database
{

    protected  $instance = null;
    public function __construct()
    {
        //singleton
       if( $this->instance === null){
           try {
               $this->instance = new \PDO("mysql:host=localhost;dbname=Bank", 'root', '');

               // set the PDO error mode to exception
               $this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           } catch(PDOException $e) {
               echo "Connection failed: " . $e->getMessage();
           }
       }
       else{
           return $this->instance;
       }
    }

    public function store($table_name,$datas) {
       try{
           $key = array_keys($datas);  //get key( column name)

           $value = array_values($datas);  //get values (values to be inserted)

           $query ="INSERT INTO  $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";
           $statement = $this->instance->prepare($query);
           $statement->execute();
           return 'successfully data added';
       }catch (\Exception $exception){
           return $exception->getMessage();
       }

    }

    public function get(){
        $table_name =  strtolower(str_replace('App\\','',get_class($this)));
        $result = $this->instance->query("SELECT * FROM `$table_name`")->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}