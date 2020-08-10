<?php
    require("functions.php");

    $pid = $_POST['patientId'];

    $flag = updatePatient($pid,$_POST);

    if($flag == TRUE) {
        header("Location: Pricription.php?patientId=".$pid);
        die();
    } else {
        die("Erorr updating patient");
    }
    
?>