<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gishe</title>
    <link href="./view/assets/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="./view/assets/css/mystyle.css">
    <link rel="icon" href="./view/assets/img/icon.png" sizes="20x20">
</head>
<body>
  
<?php

include 'header.php';
include 'main.php';
include 'footer.php';

?>




<script src="./view/assets/js/jquery.js" ></script>
<script src="./view/assets/js/popper.js" ></script>
<script src="./view/assets/js/bootstrap.js" ></script>
<script src="./view/assets/js/fontawesome.min.js"></script>
<!--<script src="./assets/js/script1.js"></script>-->
<script>
    $("button.form-none").click(function(){
        $(this).toggleClass("form-show");
        $(this).toggleClass("form-close");
        $("#mainform").toggle();
    });

    $("button.login-none").click(function(){
        $(this).toggleClass("login-show");
        $(this).toggleClass("login-close");
        $(".user_info").toggle();
    });
</script>

</body>
</html>