<?php
    include "../../../class/cls_db.php";
    session_start();

    unset($_SESSION['admin']);
    unset($_SESSION['admin_name']);
    header("location: login.php");
 ?>
