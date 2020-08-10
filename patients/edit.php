<?php
    session_start();
    require("../functions.php");


    if(!isset($_SESSION['adminId'])) {
        header('Location: admin-login.php');
        die();
    }


    $patientId = NULL;
    

    if ( isset($_GET['patientId']) ) {
        $patientId = $_GET['patientId'];
    } else {
        die("Patient Id not provided");
    }

    $patient = getPatient( $patientId);

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
            <h1>Patients</h1>

            <form action="update-action.php" method="POST">
                <input type="hidden" name="patientId" value="<?php echo $patientId; ?>" />

                <div class="form-group">
                    <label for="patientName">Name:</label>
                    <input type="text" class="form-control" id="patientName" value="<?php echo $patient["patientName"] ?>" name="patientName">
                </div>

                <div class="form-group">
                    <label for="patientContact">Contact:</label>
                    <input type="text" class="form-control" id="patientContact" value="<?php echo $patient["patientContact"] ?>" name="patientContact">
                </div>

                <div class="form-group">
                    <label for="patientAddress">Address:</label>
                    <input type="text" class="form-control" id="patientAddress" value="<?php echo $patient["patientAddress"] ?>" name="patientAddress">
                </div>

                <div class="form-group">
                    <label for="patientGender">Gender:</label>
                    <input type="text" class="form-control" id="patientGender" value="<?php echo $patient["patientGender"] ?>" name="patientGender">
                </div>

                <div class="form-group">
                    <label for="patientDob">Dob:</label>
                    <input type="text" class="form-control" id="patientDob" value="<?php echo $patient["patientDob"] ?>" name="patientDob">
                </div>

                <div class="form-group">
                    <label for="patientDob">Password:</label>
                    <input type="text" class="form-control" id="patientPassword" value="<?php echo $patient["patientPassword"] ?>" name="patientPassword" />
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>

</body>
</html>