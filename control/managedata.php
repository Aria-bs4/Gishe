<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/13/2019
 * Time: 2:31 PM
 */
///// include here data base creat and prepare ///////
include 'user.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($is_log == false){
    $welcome = "شما قبلا ورود نکرده اید";
}


if($_SERVER['REQUEST_METHOD']== "POST") {
    if( isset($_REQUEST['signin']) ){
       include 'signin.php';
    }elseif ( isset($_REQUEST['login']) ){
        ////////    here we put log in information
        include 'login.php';
    }elseif (isset($_REQUEST['exit'])){
        include 'exit.php';
    }
}








