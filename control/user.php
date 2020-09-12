<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/15/2019
 * Time: 2:57 PM
 */
include 'config.php';

//////////////////////////////////////////////////   sql to create table
$CRT = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
melicode VARCHAR(30) NOT NULL,
age VARCHAR(30) NOT NULL,
gender VARCHAR(50) NOT NULL,
ticket VARCHAR(30) NOT NULL
)";

if (!$aria_database->query($CRT) === TRUE) {
    echo "Error creating table: " . $aria_database->error;
}

//////////////////////////////////////////////// prepare here
$stmt = $aria_database->prepare("INSERT INTO users (firstname, lastname ,melicode ,age ,gender ,ticket) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $dbname, $dblast_name, $dbmeli ,$dbage , $dbgender , $dbticket);