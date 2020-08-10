<?php
    require("functions.php");

    $patientId = NULL;
    if(isset($_GET['patientId'])) {
        $patientId = $_GET['patientId'];
    } else {
        die("404 - Not Found");
    }

    $patient = getPatient($patientId);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body class="bg1">

    <div class="container">
        <h2> Edit Patient Details</h2>
        <form action="updatepatient.php" method="POST">
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
                <label for="patientDob">Date:</label>
                <input type="text" class="form-control" id="patientDob" value="<?php echo $patient["patientDob"] ?>" name="patientDob">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>