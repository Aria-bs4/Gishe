<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/15/2019
 * Time: 6:37 PM
 */

$log_name = test_input($_REQUEST['log-name']);
$log_meli = test_input($_REQUEST['log-meli']);
$log_isok = true;   ///its for all input is fill
$try_login = true;

if( !empty($_REQUEST['log-name']) ){

}else{
    //////eror empty name in log in
    $erorlogin_name = "نام خود را وارد کنید";
    $log_isok = false;
}

if( !empty($_REQUEST['log-meli'])){

}else{
     ///////////err empty meli code
    $erorlogin_meli = "کد ملی خود را وارد کنید";
    $log_isok = false;
}

if($log_isok == true) {
    ///// log in succsufully
    $sql = "SELECT  firstname, lastname ,melicode,ticket FROM users";
    $result = $aria_database->query($sql);
    $check_log = 0;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($log_meli == $row['melicode'] && $log_name == $row['firstname']) {
                $lname = $row['lastname'];
                $check_log = 1;
                $user_sit = $row['ticket'];
                break;
            }
        }
    }
    if ($check_log == 1 ) {
        setcookie("melicode", $log_meli, time() + (60 * 60 * 24 * 30), "/");
        $welcome = 'خوش امدید: <br>';
        $welcome .= "کاربر : ";
        $welcome .= $log_name . " " . $lname;
        $try_login = false;
        $is_log = true;
    } else {
        $not_login = 'اطلاعات شما در سیستم وجود ندارد لطفا ثبت نام کنید';
    }

}else{
    $not_login = 'اطلاعات خود را کامل وارد کنید';
}
