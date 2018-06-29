<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/16/2018
 * Time: 8:26 PM
 */
//session_start();

//$db_location = "52.91.153.176";
//$db_location = "172.30.2.40";
$db_location = "127.0.0.1";
$db_username = "student24";
$db_password = 'pass24';
$db_database = "student24";
$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database, 6306);
