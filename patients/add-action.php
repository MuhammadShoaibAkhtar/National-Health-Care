<?php 
require("../functions.php");

$fileName = NULL;



if(isset($_FILES['patientPicture'])) {

    $path = realpath( "..".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."patients" );

    $fileName = saveImage($_FILES['patientPicture'], $path);
}


$_POST['patientPicture'] = $fileName;

$response =  addPatient($_POST);

if($response) {
    header('Location: index.php');
}
else
{
    die("Error Adding Patient");
}

?>