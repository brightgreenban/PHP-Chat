<?php
    session_start();

    require "../server/config.php";

    if(!isset($_SESSION['id'])){
        header("Location:".$site_url);
    }
    else{
        ?>

        <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../css/style.css" type="text/css">
            <title>Название</title>
        </head>
        <body>
            <div class="singInDeals">
                <form method="POST" action="<?=$site_url;?>/modules/auth.php">

                    </div>

                </form>
            </div>

            <div>
                <a href="<?=$site_url;?>/modules/exit.php"> Выйти</a>
            </div>
        </body>
        </html>


        <?php
    }
?>