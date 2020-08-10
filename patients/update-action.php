<?php
    require("../functions.php");

    $pid = $_POST['patientId'];

    $flag = updatePatient($pid,$_POST);


    if($flag == TRUE) {
        header("Location: index.php");
        die();
    } else {
        die("Erorr updating patient");
    }


?>