<?php
session_start();
require '../../element/mod/userCls.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new user();
            $status = $user->UserCheckLogin($username, $password);
            echo json_encode($status);
            ?>