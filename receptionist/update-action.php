<?php
    require("../functions.php");

    $id = $_POST['receptionistId'];

    $flag = updateReceptionist($id,$_POST);

    if($flag == TRUE) {
        header("Location: index.php");
        die();
    } else {
        die("Erorr updating receptionist");
    }


?>