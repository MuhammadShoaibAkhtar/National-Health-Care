<?php
    session_start();
    require("../functions.php");


    if(!isset($_SESSION['adminId'])) {
        header('Location: admin-login.php');
        die();
    }


    $receptionistId = NULL;
    

    if ( isset($_GET['receptionistId']) ) {
        $receptionistId = $_GET['receptionistId'];
    } else {
        die("Patient Id not provided");
    }

    $receptionist = getReceptionist($receptionistId);

    // echo "<pre>";
    // var_dump($receptionist);
    // echo "</pre>";
    // die();
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
            <h1>Receptionist</h1>

            <form action="update-action.php" method="POST">
                <input type="hidden" name="receptionistId" value="<?php echo $receptionistId; ?>" />

                <div class="form-group">
                    <label for="receptionistName">receptionistName:</label>
                    <input type="text" class="form-control" id="receptionistName" value="<?php echo $receptionist["receptionistName"] ?>" name="receptionistName">
                </div>

                <div class="form-group">
                    <label for="receptionistEmail">receptionistEmail:</label>
                    <input type="text" class="form-control" id="receptionistEmail" value="<?php echo $receptionist["receptionistEmail"] ?>" name="receptionistEmail">
                </div>

                <div class="form-group">
                    <label for="receptionistPassword">receptionistPassword:</label>
                    <input type="text" class="form-control" id="receptionistPassword" value="<?php echo $receptionist["receptionistPassword"] ?>" name="receptionistPassword">
                </div>

                <div class="form-group">
                    <label for="receptionistContact">receptionistContact:</label>
                    <input type="text" class="form-control" id="receptionistContact" value="<?php echo $receptionist["receptionistContact"] ?>" name="receptionistContact">
                </div>


                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>

</body>
</html>