<?php
session_start();
require  "../server/config.php";

if(isset($_SESSION['id'])){
    header("Location:".$site_url."/modules/chat.php");
}
else{
    if(isset($_POST['submit'])){
        $email = trim(htmlspecialchars($_POST['email']));
        $login = trim(htmlspecialchars($_POST['login']));
        $password = trim(htmlspecialchars(md5($_POST['password'])));

        $query2=mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$email'");
        if(mysqli_num_rows($query2)>0){
            echo "<div class='echoError'><small><small>Пользователь с такой эл. почтой уже существует</small></small></div>";
        } else{
            $query3=mysqli_query($db, "INSERT INTO `users` (`login`, `password`, `email`) VALUES ('".$_POST['login']."','".$_POST['password']."','".$_POST['email']."')");
            if(!$query3)
                echo "<div class='echoError'><small><small>Не удалось добавить пользователя</small></small></div>";
            }
        }
    }

    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <title>Название</title>
    </head>
    <body>
    <div class="singInDeals">
        <form method="POST" action="<?=$site_url;?>/modules/reg.php">
            <div class="formInput">
                <p class="tittleText">Sign Up</p>
                <hr size="1px" width="230px" noshade="" color="#ffffff">
                <p class="corporationText">Corporation Name</p>
                <img id="logImg" src="../img/mail.png" alt="">
                <input class="inputFields" type="text" name="email" placeholder="E-mail"> <br>
                <img id="logImg" src="../img/login.png" alt="">
                <input class="inputFields" type="text" name="login" placeholder="Login"> <br>
                <img id="logImg" src="../img/pass.png" alt="">
                <input class="inputFields" type="password" name="password" placeholder="Password"> <br>
                <input id="subButton" type="submit" name="submit" value="Sign Up"> <br>
                <p id="termsForm">By clicking the Sign Up button, you agree to our <a class="termsText" id="formInfoSignUp" href="#">Terms & Conditions</a>, and <a class="termsText" id="formInfoSignUp" href="#">Privacy Policy</a> </p>
                <p id="formInfoSignUp" class="formInfo">Already have an account? <a href="<?=$site_url;?>/modules/auth.php">Login Here</a></p>
            </div>

        </form>
    </div>
    </body>
    </html>
    <?php
?>
