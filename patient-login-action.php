<?php
session_start();
require("connection.php");

if(isset($_POST['cnic']) && isset($_POST['password'])) {

    $cnic = $_POST['cnic'];
    $password = $_POST['password'];

    $query = "SELECT * from patient WHERE patientCnic='".$cnic."' AND patientPassword='".$password."'";

    $result = $mysqli->query($query);

    if(!$result) {
        header('Location: patient-login.php?error=2');
        die();
    }

    if($result->num_rows == 0) {
        header('Location: patient-login.php?error=3');
        die();
    }

    $patient = $result -> fetch_assoc();

    $_SESSION["patientId"] = $patient["patientId"];



    header('Location: Pricription.php?patientId='.$patient["patientId"]);

} else {
    header('Location: patient-login.php?error=1');
}
die();

?>