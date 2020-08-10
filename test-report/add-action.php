<?php 
require("../functions.php");



$response =  addTestReport($_POST);

if($response) {
    header('Location: index.php');
}
else
{
    die("Error Adding Patient");
}


?>