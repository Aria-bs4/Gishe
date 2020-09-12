<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/15/2019
 * Time: 7:14 PM
 */

$istry=true; /// its for form classes
$isok = true; /// its for check all input are fill




$first_name_in = test_input($_REQUEST['fname']);
$last_name_in = test_input($_REQUEST['lname']);
$N_meli_in = test_input($_REQUEST['meli']);
$age_in = test_input($_REQUEST['age']);

if (!empty($_REQUEST['gender'])) {
    $gender_in = test_input($_REQUEST['gender']);
}

//////////////////    CHECK     is name fill    ///////////////////
if (!empty($_REQUEST['fname'])) {
    $dbname = $first_name_in;
} else {
    $eror_firstname = 'لطفا نام خود را وارد کنید';
    $isok = false;
}

//////////////////    CHECK     is last name fill    ///////////////////
if (!empty($_REQUEST['lname'])) {
    $dblast_name = $last_name_in;
} else {
    $eror_lasttname = 'لطفا نام خانوادگی خود را وارد کنید';
    $isok = false;
}

//////////////////    CHECK     is MELI fill    ///////////////////
if (!empty($_REQUEST['meli'])) {
    $dbmeli = $N_meli_in;
} else {
    $eror_meli = 'لطفا کد ملی خود را وارد کنید';
    $isok = false;
}

//////////////////    CHECK     is AGE fill    ///////////////////
if (!empty($_REQUEST['age'])) {
    $dbage = $age_in;
} else {
    $eror_age = 'لطفا سن خود را وارد کنید';
    $isok = false;
}

//////////////////    CHECK     is GRNDER fill    ///////////////////
if (!empty($_REQUEST['gender'])) {
    $dbgender = $gender_in;
} else {
    $eror_gender = 'لطفا جنسیت خود را تعیین کنید';
    $isok = false;
}
if ($isok == true){
    $sql = "SELECT melicode FROM users";
    $result = $aria_database->query($sql);
    $check=0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if( $N_meli_in == $row['melicode'] ){
                $check=1;
                break;
            }
        }
    }
    ////////////  show in another box user info and set in DATABASE ///////
    if($check == 0){

        include "manageticket.php";

        $stmt->execute();
        $welcome= 'اطلاعات شما با موفقیت ثبت شد.<br>';
        $welcome .= "کاربر : ";
        $welcome .= $first_name_in." ".$last_name_in."<br>";
        $welcome .= "کد ملی : ";
        $welcome .= $N_meli_in."<br>";
        $welcome .=  $age_in . " ساله. <br>";
        $welcome .= "شماره صندلی : "."$dbticket";
        $user_sit = $dbticket;
        $istry=false;
        setcookie("melicode",$N_meli_in,time()+ (60*60*24*30),"/");
        $is_log = true;
    }else{
        $welcome = 'کد ملی شما قبلا در این سامانه ثبت شده است! <br>';
        $welcome .= "لطفا اطلاعات خود را مجددا چک کنید";
        $N_meli_in = "";
        $istry=true;
    }
}else{
    $welcome = 'لطفا اطلاعات خود را کامل وارد کنید';
    $welcome .= "<br>";
    $welcome .= "تمام قسمت ها باید پر شوند";
    $istry=true;
}

