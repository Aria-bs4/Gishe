<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/13/2019
 * Time: 5:23 PM
 */

$servername = 'localhost';
$username = 'root';
$password = '';
$dt_name = 'gishe';

$aria_database = new mysqli($servername,$username,$password);

/////////////////////////////////////////////////  check connection
if ($aria_database->connect_error){
    die('error is : '. $aria_database->connect_error);
}
/////////////////////////////////////////////////  create dt : gishe
$CRT = 'CREATE DATABASE IF NOT EXISTS gishe';
if (!$aria_database->query($CRT) === TRUE) {
    echo "Error creating database: " . $aria_database->error;
}

/////////////////////////////////////////////////  new connection wit name
$aria_database = new mysqli($servername,$username,$password,$dt_name);

/////////////////////////////////////////////////   check connection
if ($aria_database->connect_error){
    die('error is : '. $aria_database->connect_error);
}
