<?php
    require("../functions.php");

    $id = $_POST['testLabId'];

    $flag = updateTestLab($id,$_POST);

    if($flag == TRUE) {
        header("Location: index.php");
        die();
    } else {
        die("Erorr updating patient");
    }


?>