<?php
session_start();
require("connection.php");

if(isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * from admin WHERE adminEmail='".$email."' AND adminPassword='".$password."'";

    $result = $mysqli->query($query);

    if(!$result) {
        header('Location: admin-login.php?error=2');
        die();
    }

    if($result->num_rows == 0) {
        header('Location: admin-login.php?error=3');
        die();
    }

    $admin = $result -> fetch_assoc();

    $_SESSION["adminId"] = $admin["adminId"];



    header("Location: adminportal.php");

} else {
    header("Location: admin-login.php?error=1");
}

die();

?>