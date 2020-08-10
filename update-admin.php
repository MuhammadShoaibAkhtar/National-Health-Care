<?php
    require("functions.php");

    $adminId = $_POST['adminId'];

    $flag = updateAdmin($adminId,$_POST);

    if($flag == TRUE) {
        header("Location: adminportal.php");
        die();
    } else {
        die("Erorr updating patient");
    }
    
?>