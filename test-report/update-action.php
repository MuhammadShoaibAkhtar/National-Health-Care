<?php
    require("../functions.php");

    $id = $_POST['testReportId'];

    $flag = updateTestReport($id,$_POST);

    if($flag == TRUE) {
        header("Location: index.php");
        die();
    } else {
        die("Erorr updating receptionist");
    }


?>