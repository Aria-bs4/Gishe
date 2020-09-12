<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/16/2019
 * Time: 10:39 PM
 */
include 'user.php';

if(isset($_COOKIE['melicode'])){
    $code = $_COOKIE['melicode'];
    $sql = "SELECT firstname,lastname,melicode,ticket FROM users";
    $result = $aria_database->query($sql);
    while($row = $result->fetch_assoc()) {
        if($code == $row['melicode']){
            $user_sit = $row['ticket'];
            $welcome = 'خوش امدید: <br>';
            $welcome .=  "کاربر : " ;
            $welcome .=  $row['firstname']." " . $row['lastname'];
            $is_log = true;
            break;
        }
    }
}

$aria_database->close();