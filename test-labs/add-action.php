<?php 
require("../functions.php");


$response =  addTestLab($_POST);

if($response) {
    header('Location: index.php');
}
else
{
    die("Error Adding Patient");
}


?>