<?php

if (isset($_GET['req'])) {
    $request = $_GET['req'];
    switch ($request) {
        case 'userview':
            require './element/mUser/userView.php';
            break;
        case 'updateuser':
            require './element/mUser/userUpdate.php';
            break;
        
    }
} else {
    require 'default.php';
}
?>