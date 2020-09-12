<?php

include './control/variable.php';
include './control/cookies.php';
include './control/managedata.php';
$sql = "SELECT ticket FROM users";
$result = $aria_database->query($sql);
////////////   check print result then if isset echo another class
$fill_ticket =array();
while($row = $result->fetch_assoc()) {
    $fill_ticket[]=$row['ticket'];
}


$percent = array();
$percent[1] = .9;
for($i=2 ; $i<21 ; $i++){
    $percent[$i] =  4.95 + $percent[$i-1];
}


?>



<main id="main">
    <section id="slider">
        <div class="container">

        </div>
    </section>
    <section id="help">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="help-box">
                        <p>جایگاه اقایان : 0 - 60</p>
                        <p>جایگاه بانوان : 97 - 156</p>
                        <p>جایگاه کودکان زیر 10 سال : 61 - 96</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="color-box">
                        <div class="green"><p>جایگاه شما</p></div>
                        <div class="red"><p>جایگاه اشغال</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog">
        <div class="container">
            <div class="stodium">
                <span class="stage">
                    <span class="stage_beta"></span>
                </span>
                <?php
                for($i=1 ; $i<157 ; $i++){
                    if($i<21){
                        $j = $i;
                        $k = 1;
                    }elseif ($i<41){
                        $j =  $i - 20;
                        $k = 2;
                    }elseif ($i<61){
                        $j =  $i - 40;
                        $k = 3;
                    }elseif ($i<67){
                        $j =  $i - 60;
                        $k = 4;
                    }elseif ($i<73){
                        $j =  $i - 52;
                        $k = 4;
                    }elseif ($i<79){
                        $j =  $i - 72;
                        $k = 5;
                    }elseif ($i<85){
                        $j =  $i - 64;
                        $k = 5;
                    }elseif ($i<91){
                        $j =  $i - 84;
                        $k = 6;
                    }elseif ($i<97){
                        $j =  $i - 76;
                        $k = 6;
                    }elseif ($i<117){
                        $j =  $i - 96;
                        $k = 7;
                    }elseif ($i<137){
                        $j =  $i - 116;
                        $k = 8;
                    }elseif ($i<157){
                        $j =  $i - 136;
                        $k = 9;
                    }

                    if(array_search($i,$fill_ticket) !==false){
                        if($user_sit == $i){
                            echo "<div class=\"bars$k bar$i f\" style='left: $percent[$j]%'><p>$i</p></div>";
                        }else{
                            echo "<div class=\"bars$k bar$i v\" style='left: $percent[$j]%'><p>$i</p></div>";
                        }
                    }else{
                        echo "<div class=\"bars$k bar$i\" style='left: $percent[$j]%'><p>$i</p></div>";
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <section id="myform">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="bottom-login">
                        <button class="login-none <?php
                        if($try_login == false ){echo 'login-show';}
                        else {echo 'login-close';}
                        ?>"><p>برای ورود کلیک کنید</p></button>
                        <div style="<?php
                        if($try_login == false ) echo 'display:none';
                        else echo 'display:block';
                        ?>" class="user_info">

                            <form id="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <fieldset>
                                    <p>اگر قبلا بلیط تهیه کرده اید با وارد کردن کد ملی خود وارد سایت شوید</p>
                                    نام:
                                    <br>
                                    <input type="text" autofocus name="log-name" placeholder="نام" value="<?php echo $log_name ; ?>" ><span class="erorshow"><?php echo $erorlogin_name;?> </span>
                                    <br>
                                    کد ملی:
                                    <br>
                                    <input type="text" name="log-meli" placeholder="کد ملی" value="<?php echo $log_meli; ?>"><span class="erorshow"><?php echo $erorlogin_meli; ?> </span>
                                    <br><br>
                                    <input type="submit" name="login" value="وارد شوید" >
                                    <span class="notexist"><?php echo $not_login ?></span>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <div class="all-alert">
                        <p><?php echo $welcome ?></p>
                        <button form="login-form" name="exit" class="exit" style="<?php if($is_log == false)
                            echo "display:none" ?>"> خروج</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-form">
                        <button class="form-none <?php
                        if($istry == false ){echo 'form-show';}
                        else {echo 'form-close';}
                        ?>"><p>برای خرید بلیط کلیک کنید</P></button>
<!--                        ////////// here you should put a form//////////////-->
                        <form style="<?php
                                if($istry == false ) echo 'display:none';
                                else echo 'display:block';
                                ?>" method="post" id="mainform" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <fieldset>
                                <legend>اطلاعات خود را وارد کنید:</legend>
                                نام:
                                <br>
                                <input type="text" name="fname" autocomplete="off" autofocus value="<?php echo $first_name_in; ?>" placeholder="نام"><span class="errorshow">*<?php echo $eror_firstname; ?></span><br>
                                نام خانوادگی:
                                <br>
                                <input type="text" name="lname" value="<?php echo $last_name_in; ?>" placeholder="نام خانوادگی"><span class="errorshow">*<?php echo $eror_lasttname; ?></span><br>
                                کد ملی :
                                <br>
                                <input type="number" autocomplete="off" name="meli" value="<?php echo $N_meli_in; ?>" placeholder="کد ملی"><span class="errorshow">*<?php echo $eror_meli; ?></span><br>
                                سن:
                                <br>
                                <input type="number" autocomplete="off" name="age" value="<?php echo $age_in; ?>" placeholder="سن"><span class="errorshow">*<?php echo $eror_age; ?></span><br>
                                جنسیت:
                                <span class="errorshow">*<?php echo $eror_gender; ?></span>
                                <br>
                                <label class="mylabel">مرد
                                    <input type="radio" name="gender" value="male" <?php if($gender_in == "male") echo "checked"; ?> >
                                    <span class="checkbox"></span>
                                </label>
                                <label class="mylabel">زن
                                    <input type="radio" name="gender" value="female" <?php if($gender_in == "female") echo "checked"; ?> >
                                    <span class="checkbox"></span>
                                </label>
                                <input type="submit" name="signin" value="نهایی کردن خرید" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="social_media">
                <div class="social-box">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram-plane"></i></a>
                    <a href="#"><i class="far fa-envelope"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </section>
</main>
