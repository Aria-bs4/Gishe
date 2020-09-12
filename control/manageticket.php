<?php
/**
 * Created by PhpStorm.
 * User: ARIA
 * Date: 8/16/2019
 * Time: 11:29 AM
 */


$sql = "SELECT  ticket FROM users";
$result = $aria_database->query($sql);

if($age_in > 10){
    if($gender_in == "male" ){
        $dbticket = is_rand_ok(1,60);
    }else{
        $dbticket = is_rand_ok(97,156);
    }
}else{
    $dbticket = is_rand_ok(61,96);
}

function is_rand_ok($min,$max){
    global $result;
    $newrand = rand($min,$max);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if( $newrand == $row['ticket'] ){
                return is_rand_ok($min,$max);
            }
        }
    }
    return $newrand;
}