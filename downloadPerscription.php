<?php
require('functions.php');

$prescriptionId = NULL;

if(isset($_GET['prescriptionId'])){
    $prescriptionId = $_GET['prescriptionId'];
} else {
    die("No prescriptionId provided");
}


$prescription = getPrescription($prescriptionId);








$filename = tempnam(sys_get_temp_dir(), 'nha');

$fp = fopen($filename, 'w'); 
fwrite($fp, $prescription['prescriptionDocument']);
fclose($fp);

$ctype = mime_content_type($filename) ;


header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=perscription".$prescriptionId.".pdf;" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); 

ob_clean();
flush();

unlink($filename);
echo $prescription['prescriptionDocument'];
?>