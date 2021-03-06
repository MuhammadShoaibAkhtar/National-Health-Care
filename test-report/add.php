<?php
    session_start();
    require("../functions.php");


    if(!isset($_SESSION['adminId'])) {
        header('Location: admin-login.php');
        die();
    }

    $patients = getAllPatients();
    $testLabs = getAllTestLabs();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>View Patients</title>
    <link rel="stylesheet" type="text/css" href="../style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body class="bg">

    <div id="header">
        <h1>Health care Assistant</h1>
        <a href="logout-admin.php" class="btn btn-primary">Logout</a>
    </div>
    <div class="container">
        <div class="col-md-12">
        <h1>Test Report</h1>

        <form action="add-action.php" method="POST">

            <div class="form-group">
                <label for="patientId">patientId:</label>
                <select class="form-control" name="patientId" id="patientId">
                    <option>Select Patient</option>

                    <?php foreach ($patients  as $p) {?>
                    <option value="<?php echo $p['patientId']; ?>"><?php echo $p['patientName']; ?></option>
                    <?php } ?>

                </select>
            </div>

            <div class="form-group">
                <label for="testReportDate">testReportDate:</label>
                <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="testReportDate" name="testReportDate">
            </div>

            <div class="form-group">
                <label for="testReportResult">testReportResult:</label>
                <input type="text" class="form-control" id="testReportResult" name="testReportResult">
            </div>

            <div class="form-group">
                <label for="testReportDescription">testReportDescription:</label>
                <input type="text" class="form-control" id="testReportDescription" name="testReportDescription">
            </div>

            <div class="form-group">
                <label for="testLabId">testLabId:</label>
                <select class="form-control" name="testLabId" id="testLabId">
                    <option>Select Lab</option>

                    <?php foreach ($testLabs  as $lab) {?>
                        <option value="<?php echo $lab['testLabId']; ?>" ><?php echo $lab['testLabName']; ?></option>
                    <?php } ?>

                </select>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        </div>
    </div>

</body>
</html>