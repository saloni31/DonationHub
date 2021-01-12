<?php
session_start();
require "../database/config.php";
if(isset($_POST['data_user'])){
    session_destroy();
    echo "DONE";
}
//if(isset($_POST['data_admin'])){
//    session_destroy();
//    echo "DONE";
//}
//
//if(isset($_POST['data_donor'])){
//    session_destroy();
//    echo "DONE";
//}
?>