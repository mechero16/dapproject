<?php

define('db_host','localhost');
define('db_user','root');
define('db_password','');
define('db_name','dsp');

$conn= new mysqli(db_host,db_user,db_password,db_name);

if($conn != true){
   
    die("Connection failed: " . mysqli_connect_error());
     
}






