<?php
$base = "http://localhost:84/bolosdavovo/App/";
$db_host = "127.0.0.1";
$db_port = 3310;
$db_name = "bolos";
$db_user = "root";
$db_pwd = "";



$pdo = new pdo('mysql: host='.$db_host. ';port='.$db_port. ';dbname='.$db_name, $db_user, $db_pwd);


