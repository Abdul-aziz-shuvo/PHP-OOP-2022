<?php

require 'App/User.php';
//require 'App/Database.php';


$database = new App\Database();
$user = new App\User();
//store data
var_dump($user->post('user',[
    'name' => 'shuvo',
    'email' => 'shuvo@gmail.com',
    'password' => '12345678'
]));
echo '<br>';
echo '<br>';
echo '<br>';
echo 'Get all user data';
//get data
echo '<br>';
var_dump($user->get());
echo '<br>';
echo '<br>';
echo '<br>';

echo 'Find user data here';
echo '<br>';
//find data
var_dump($user->find(50));
