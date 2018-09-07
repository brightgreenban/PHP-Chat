<?php
    session_start();
    require  "../server/config.php";

    if(isset($_SESSION['id'])){
        header("Location:".$site_url."/modules/chat.php");
    }
    else{
        if(isset($_POST['submit'])){
            $login = trim(htmlspecialchars($_POST['login']));
            $password = trim(htmlspecialchars(md5($_POST['password'])));

            $query1 = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '".$_POST['login']."' AND `password` = '".$_POST['password']."'");
            if(mysqli_num_rows($query1)>0){
                $users = mysqli_fetch_assoc($query1);
                $_SESSION['id'] = $users['id'];
                header("Location:".$site_url."/modules/chat.php");
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
            <p class="tittleText">Sign In</p>
            <hr size="1px" width="230px" noshade="" color="#ffffff">
            <p class="corporationText">Corporation Name</p>
            <form method="POST" action="<?=$site_url;?>/modules/auth.php">
                <div class="formInput">
                    <img id="logImg" src="../img/login.png" alt="">
                    <input class="inputFields" id="log" type="text" name="login" placeholder="Login"> <br>
                    <img id="logImg" src="../img/pass.png" alt="">
                    <input class="inputFields" id="pass" type="password" name="password" placeholder="Password"> <br>
                    <input id="subButton" type="submit" name="submit" value="Sign In"> <br>
                    <p id="formInfoLogin" class="formInfo"> Don't have an account? <a href="<?=$site_url;?>/modules/reg.php">Sign Up Here</a></p>
                </div>
            </form>
        </div>
        </body>
        </html>
        <?php
    }
?>
