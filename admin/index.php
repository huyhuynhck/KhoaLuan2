
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="style/codewebcss.css"/>
<!--        <script type="text/javascript" src="js_FN/jquery_3.6.0.js"></script>
        <script type="text/javascript" src="js_FN/jscript.js"></script>
        <script type="text/javascript" src="js_FN/zz.js"></script>
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>-->

        <title>Đăng nhập</title>
    </head>
    <body>
        <div id="main_content">
            <?php
            session_start();
            ?>
            <?php
            if (!isset($_SESSION['USER']) and!isset($_SESSION['ADMIN'])) {
                header('location: userLogin.php');
            }
            ?>
            <div id="top_div">
                <?php
                require './element/top.php';
                ?>
            </div>
            <div id="left_div">
                <?php
                require './element/left.php';
                ?> 
            </div>
            <div id="center_div">
                <?php
                require './element/center.php';
                ?> 
            </div>
            <div id="right_div">
                <?php
                require './element/right.php';
                ?> 
            </div>
            <div id="bottom_div">
                <?php
                ?> 
            </div>
            <div class="signoutbutton">
                <a href="element/mUser/userAct.php?reqact=userlogout">
                    <img style="height: 20px" src="./Image/logout.png" class="iconbuttion">
                </a>
            </div>
        </div>
    </body>
</html>
