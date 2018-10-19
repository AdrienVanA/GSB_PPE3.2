<?php

//DATABASE CONNECTION SCRIPT
//voir pattern singleton sur internet

define ('host','location'); //database hostname , localhost ici
define('user', 'root'); //datebase user, ici root
define('password', '');//database mdp,
define('Database', 'GSB_medicalrep');//datebase name
define('CHARSET', 'utf8');

function DB (){
    
    static $instance;
    
if ($instance===null){
    $opt= array(
      PDO :: ATTR_ERRMODE=>PDO ::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES=>FALSE,
    
    );
  $dsn="mmysql:host=".host.", dbname=".Database.";charset=".CHARSET;
  $instance = new PDO ($dsn, user,password,$opt);
}    
    return $instance;
    
}