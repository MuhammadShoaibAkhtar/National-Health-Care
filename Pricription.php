<?php
    session_start();
    require("functions.php");

    if(!isset($_SESSION['patientId'])) {
        header('Location: patient-login.php');
        die();
    }

    $patientId = NULL;
    if(isset($_GET['patientId'])) {
        $patientId = $_GET['patientId'];
    } else {
        die("404 - Not Found");
    }

    // Perform query
    $perscriptions = fetchPricription($patientId);
    $testreport = getTestReport($patientId);
    $patient = getPatient($patientId);

?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Patient Prescription</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body class="bg">

    <div>


        <div id="header">
            <h1>Health care Assistant</h1>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
        <div class="container">
            <div class="col-md-4">
                <div action="/action_page.php" method="get">
                    <div class="thumbnail">
                        <a href="shoaib.jpg" target="_blank">

                            <?php if($patient['patientPicture'] == NULL){ ?>
                                <img src="images/default.png" alt="Lights" style="width:50%" float="left">
                            <?php } else { ?>
                                <img src="images/patients/<?php echo $patient['patientPicture']; ?>" alt="Lights" style="width:50%" float="left">
                            <?php } ?>

                            <div class="caption">
                                <p><?php echo $patient['patientName']; ?></p>
                                <?php 
                                    $_age = floor((time() - strtotime($patient['patientDob'])) / 31556926);
                                ?>
                                <p>Age:<?php echo $_age; ?></p>
                                <p>Gender: <?php echo $patient['patientGender']; ?></p>
                                <p><?php echo $patient['patientContact']; ?></p>
                            </div>
                        </a>
                        <div class="btn-group">
                            <a href="EditForm.php?patientId=<?php echo $patientId?>"> <button type="button" class="btn btn-primary">Edit
                                    Details</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="btn-group btn-group-lg">
                    <button type="button" class="btn btn-primary" onclick="openTable('prescription')">Prescription</button>
                    <button type="button" class="btn btn-primary" onclick="openTable('test-report')">Test Report</button>
                </div>

                <table class="table" id="prescription-table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Disease Type</th>
                        <th scope="col">Hospital Name</th>
                        <th scope="col">Print</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0; $i < count($perscriptions) ; $i++) { ?>
                            <tr>
                                <th scope="row"><?php echo $perscriptions[$i]['doctorName']; ?></th>
                                <td><?php echo $perscriptions[$i]['prescriptionDisease']; ?></td>
                                <td><?php echo $perscriptions[$i]['hospitalName']; ?></td>
                                <td><a target="_blank" href="downloadPerscription.php?prescriptionId=<?php echo $perscriptions[$i]['prescriptionId']; ?>">Click Here</a></td>
                            </tr>
                        <?php } ?>                    
                    </tbody>
                  </table>

                  
                <table class="table" id="test-report-table" style="display:none;">
                    <thead class="thead-light">
                        <th scope="col">Institute Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Lab Report</th>
                        <th scope="col">Test Report Description</th>
                    </thead>
                    <tbody>
                    <?php for($i=0; $i < count($testreport) ; $i++) { ?>
                        <tr>
                        <th scope="row">1<?php echo $testreport[$i]['testLabName']; ?></th>
                        <td><?php echo $testreport[$i]['testReportDate']; ?></td>
                        <td><?php echo $testreport[$i]['testReportResult']; ?></td>
                        <td><?php echo $testreport[$i]['testReportDescription']; ?></td>
                        </tr>
                        <?php } ?> 
                        
                    </tbody>
                </table>


            </div>
        </div>

    </div>

    <script>
        function openTable(value) {
            var perscriptionTable = document.getElementById('prescription-table');
            var testReportTable = document.getElementById('test-report-table');

            //alert(value);
            if(value == 'prescription') {
                perscriptionTable.style.display='block';
                testReportTable.style.display='none';
                
            } else {

                perscriptionTable.style.display='none';
                testReportTable.style.display='block';
            }
        }
    </script>
</body>
</html>