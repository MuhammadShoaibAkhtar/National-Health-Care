<?php 
require("../functions.php");



$fileName = NULL;



if(isset($_FILES['receptionistPicture'])) {
    $path = realpath("..".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."receptionists");

    $fileName = saveImage($_FILES['receptionistPicture'], $path);
}


$_POST['receptionistPicture'] = $fileName;


$response =  addReceptionist($_POST);

if($response) {
    header('Location: index.php');
}
else
{
    die("Error Adding Patient");
}


?>