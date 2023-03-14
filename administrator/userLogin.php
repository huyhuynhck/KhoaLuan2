
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Website</title>
        <link type="text/css" rel="stylesheet" href="style/codewebcss.css"/>
    </head>
    <body>
        <div class="loginBody">
            <h4 align="center">Đăng Nhập Hệ Thống</h4>
            <form name="frmLogin" method="post" action="element/mUser/userAct.php?reqact=checklogin">
                <table>
                    <tr>
                        <td>Tên tài khoản:</td>
                        <td><input type="text" name="username" class="username"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu:</td>
                        <td><input type="password" name="password" class="password"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Đăng nhập"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
