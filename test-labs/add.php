<?php
    session_start();
    require("../functions.php");


    if(!isset($_SESSION['adminId'])) {
        header('Location: admin-login.php');
        die();
    }

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
            <h1>Add Test Lab</h1>

            <form action="add-action.php" method="POST">

                <div class="form-group">
                    <label for="testLabName">Lab Name:</label>
                    <input type="text" class="form-control" id="testLabName" name="testLabName">
                </div>

                <div class="form-group">
                    <label for="testLabAddress">Lab Address:</label>
                    <input type="text" class="form-control" id="testLabAddress" name="testLabAddress">
                </div>

                <div class="form-group">
                    <label for="testLabPhone">Lab Phone:</label>
                    <input type="text" class="form-control" id="testLabPhone" name="testLabPhone">
                </div>

                <button type="submit" class="btn btn-default">Add</button>

            </form>

        </div>
    </div>

</body>
</html>