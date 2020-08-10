<?php
require('connection.php');

function fetchPricription($patientId) {
    global $mysqli;

    $query = "SELECT p.prescriptionId, p.prescriptionDisease,d.doctorName, h.hospitalName FROM prescription p, doctor d, hospital h WHERE p.doctorId = d.doctorId AND p.hospitalId = h.hospitalId AND p.patientId=".$patientId;
    $perscriptions=[];
    $queryResult = $mysqli -> query($query);

    if($queryResult) {

        $perscriptions = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query";
        echo $mysqli->error;
    }

    return $perscriptions;
}


function getTestReport($patientId){
    global $mysqli;

    $query = "SELECT t.testReportDate, t.testReportResult, t.testReportDescription, l.testLabName  FROM test_report t, test_lab l WHERE t.testLabId = l.testLabId AND t.patientId=".$patientId;
    $testreport=[];
    $queryResult = $mysqli -> query($query);

    if($queryResult) {

        $testreport = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query";
    }

    return $testreport;

}

function getPatient($id) {
    global $mysqli;

    $query = "SELECT *  FROM patient WHERE patientId=".$id;
    $patient = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $patient = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $patient;
}


function getPrescription($id) {
    global $mysqli;

    $query = "SELECT *  FROM prescription WHERE prescriptionId=".$id;
    $prescription = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $prescription = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $prescription;
}

function updatePatient($patientId, $data) {

    global $mysqli;
    $notAllowed = ["patientId","patientPicture"];
    $setStr = "";

    foreach ($data as $key => $value)
    {

        if(in_array($key, $notAllowed)) {
            continue;
        }
        
        $setStr .= "`$key` = '$value',";

    }

    $setStr = rtrim($setStr, ",");

    $query = "UPDATE patient SET $setStr WHERE patientId=$patientId";

    $queryResult = $mysqli -> query($query);

    if($queryResult) {
        return true;
    }
    else {
        die($mysqli -> error);
    }
    
    return false;

}

function getAdmin($id){
    global $mysqli;

    $query = "SELECT *  FROM admin WHERE adminId=".$id;
    $admin = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $admin = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $admin;
}


function updateAdmin($adminId, $data) {
    global $mysqli;
    $query = "UPDATE admin SET adminName='".$data['adminName']."', adminContact='".$data['adminContact']."', adminEmail='".$data['adminEmail']."', adminPassword='".$data['adminPassword']."'  WHERE adminId=".$adminId;


    $queryResult = $mysqli -> query($query);

    if($queryResult) {
        return true;
    }
    else {
        die($mysqli -> error);
    }
    
    return false;
}



function getPatients( $offset,  $limit) {

    global $mysqli;
    
    $query = "SELECT * FROM patient LIMIT ".$limit." OFFSET ".$offset;
    $queryResult = $mysqli -> query($query);
    
    $patients = [];

    if($queryResult) {

        $patients = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query\n";
        echo $mysqli->error;
    }

    return $patients;

}


function addPatient($data) {
    global $mysqli;

    $keyStr = "(";
    $valueStr = "(";

    $keys = array_keys($data);
    $last_key = end($keys);

    foreach ($data as $key => $value) {
        
        $keyStr .= "$key";
        $valueStr .= "'$value'";
        
        if($last_key != $key) {
            $keyStr .= ", ";
            $valueStr .= ", ";
        }

    }

    $keyStr .= " )";
    $valueStr .= " )";

    $query = "INSERT INTO patient $keyStr VALUES $valueStr";


    if ($mysqli->query($query) === TRUE) {
        return TRUE;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    return FALSE;

}

function saveImage($file, $target_dir) {


    if (($file['name']!="")){
        


        $fileName = $file['name'];
        $path = pathinfo($fileName);
        
    
        $filename = uniqid('patient_');
    
        $ext = $path['extension'];
    
        $path_filename_ext = $target_dir.DIRECTORY_SEPARATOR.$filename.".".$ext;
        
        $tempPath = $file['tmp_name'];

        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            return FALSE;
        }else{
            if(move_uploaded_file( $tempPath , $path_filename_ext)) {
                return $filename.".".$ext;
            }else {
                

                return FALSE;
            }
        }
    }

    return FALSE;
}

function getTestLabs( $offset,  $limit) {

    global $mysqli;
    
    $query = "SELECT * FROM test_lab LIMIT ".$limit." OFFSET ".$offset;
    $queryResult = $mysqli -> query($query);
    
    $labs = [];

    if($queryResult) {

        $labs = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query\n";
        echo $mysqli->error;
    }

    return $labs;

}


function getTestLab($id){
    global $mysqli;

    $query = "SELECT *  FROM test_lab WHERE testLabId=".$id;
    $lab = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $lab = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $lab;    
}

function updateTestLab($id, $data){
    global $mysqli;
    $notAllowed = ["testLabId"];
    $setStr = "";

    foreach ($data as $key => $value)
    {

        if(in_array($key, $notAllowed)) {
            continue;
        }
        
        $setStr .= "`$key` = '$value',";

    }

    $setStr = rtrim($setStr, ",");

    $query = "UPDATE test_lab SET $setStr WHERE testLabId=$id";

    $queryResult = $mysqli -> query($query);

    if($queryResult) {
        return true;
    }
    else {
        die($mysqli -> error);
    }
    
    return false;
}

function addTestLab($data) {
    global $mysqli;

    $keyStr = "(";
    $valueStr = "(";

    $keys = array_keys($data);
    $last_key = end($keys);

    foreach ($data as $key => $value) {
        
        $keyStr .= "$key";
        $valueStr .= "'$value'";
        
        if($last_key != $key) {
            $keyStr .= ", ";
            $valueStr .= ", ";
        }

    }

    $keyStr .= " )";
    $valueStr .= " )";

    $query = "INSERT INTO test_lab $keyStr VALUES $valueStr";


    if ($mysqli->query($query) === TRUE) {
        return TRUE;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    return FALSE;    
}

function getReceptionists( $offset,  $limit) {

    global $mysqli;
    
    $query = "SELECT * FROM receptionist LIMIT ".$limit." OFFSET ".$offset;
    $queryResult = $mysqli -> query($query);
    
    $receptionists = [];

    if($queryResult) {

        $receptionists = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query\n";
        echo $mysqli->error;
    }

    return $receptionists;

}

function getReceptionist($id) {
    global $mysqli;

    $query = "SELECT *  FROM receptionist WHERE receptionistId=".$id;
    $receptionist = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $receptionist = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $receptionist;    
}


function updateReceptionist($id, $data) {
    global $mysqli;
    $notAllowed = ["receptionistId"];
    $setStr = "";

    foreach ($data as $key => $value)
    {

        if(in_array($key, $notAllowed)) {
            continue;
        }
        
        $setStr .= "`$key` = '$value',";

    }

    $setStr = rtrim($setStr, ",");

    $query = "UPDATE receptionist SET $setStr WHERE receptionistId=$id";

    $queryResult = $mysqli -> query($query);

    if($queryResult) {
        return true;
    }
    else {
        die($mysqli -> error);
    }
    
    return false;
}


function addReceptionist($data) {
    global $mysqli;

    $keyStr = "(";
    $valueStr = "(";

    $keys = array_keys($data);
    $last_key = end($keys);

    foreach ($data as $key => $value) {
        
        $keyStr .= "$key";
        $valueStr .= "'$value'";
        
        if($last_key != $key) {
            $keyStr .= ", ";
            $valueStr .= ", ";
        }

    }

    $keyStr .= " )";
    $valueStr .= " )";

    $query = "INSERT INTO receptionist $keyStr VALUES $valueStr";


    if ($mysqli->query($query) === TRUE) {
        return TRUE;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    return FALSE;
}


function getTestReports( $offset,  $limit) {

    global $mysqli;
    
    $query = "SELECT * FROM test_report LIMIT ".$limit." OFFSET ".$offset;
    $queryResult = $mysqli -> query($query);
    
    $reports = [];

    if($queryResult) {

        $reports = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query\n";
        echo $mysqli->error;
    }

    return $reports;

}

function getTestReportId($id){
    global $mysqli;

    $query = "SELECT *  FROM test_report WHERE testReportId=".$id;
    $report = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $report = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $report;  
}


function getAllPatients() {

    global $mysqli;
    
    $query = "SELECT * FROM patient WHERE 1";
    $queryResult = $mysqli -> query($query);
    
    $patients = [];

    if($queryResult) {

        $patients = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query\n";
        echo $mysqli->error;
    }

    return $patients;

}

function getAllTestLabs() {

    global $mysqli;
    
    $query = "SELECT * FROM test_lab WHERE 1";
    $queryResult = $mysqli -> query($query);
    
    $labs = [];

    if($queryResult) {

        $labs = $queryResult -> fetch_all(MYSQLI_ASSOC);

        $queryResult -> free_result();
    }
    else {
        echo "Error in executing query\n";
        echo $mysqli->error;
    }

    return $labs;

}

function updateTestReport($id, $data){
    global $mysqli;
    $notAllowed = ["testReportId"];
    $setStr = "";

    foreach ($data as $key => $value)
    {

        if(in_array($key, $notAllowed)) {
            continue;
        }
        
        $setStr .= "`$key` = '$value',";

    }

    $setStr = rtrim($setStr, ",");

    $query = "UPDATE test_report SET $setStr WHERE testReportId=$id";

    $queryResult = $mysqli -> query($query);

    if($queryResult) {
        return true;
    }
    else {
        die($mysqli -> error);
    }
    
    return false;
}


function addTestReport($data) {
    global $mysqli;

    $keyStr = "(";
    $valueStr = "(";

    $keys = array_keys($data);
    $last_key = end($keys);

    foreach ($data as $key => $value) {
        
        $keyStr .= "$key";
        $valueStr .= "'$value'";
        
        if($last_key != $key) {
            $keyStr .= ", ";
            $valueStr .= ", ";
        }

    }

    $keyStr .= " )";
    $valueStr .= " )";

    $query = "INSERT INTO test_report $keyStr VALUES $valueStr";


    if ($mysqli->query($query) === TRUE) {
        return TRUE;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    return FALSE;
}


function getPatientNameById($id){
    global $mysqli;

    $query = "SELECT patientName  FROM patient WHERE patientId=".$id;
    $patient = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $patient = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $patient['patientName'];
}

function getTestLabNameById($id){
    global $mysqli;

    $query = "SELECT testLabName  FROM test_lab WHERE testLabId=".$id;
    $lab = NULL;
    $queryResult = $mysqli -> query($query);

    if($queryResult)
    {
        $lab = $queryResult -> fetch_assoc();
    }
    else
    {
        echo "Error in executing query";
    }

    return $lab['testLabName'];
}

?>

