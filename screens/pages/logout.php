<?php
    include "../../../class/cls_db.php";
    session_start();

    unset($_SESSION['user']);
    header("location: home.php");
 ?>
