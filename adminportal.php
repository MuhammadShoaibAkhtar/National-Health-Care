<?php
    session_start();
    require("functions.php");

    if(!isset($_SESSION['adminId'])) {
        header('Location: admin-login.php');
        die();
    }

    $adminId = $_SESSION['adminId'];
    $admin = getAdmin($adminId);
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        .btn-container {
            display: inline;
            flex-direction: column;
            height: 300px;
            justify-content: space-between;
            align-items: center;
            flex-basis: 30%;
            margin-top: 30px;
        }

        .btn-container a {

            font-weight:bold;
        }
    </style>
</head>

<body class="bg">

    <div>


        <div id="header">
            <h1>Health care Assistant</h1>
            <a href="logout-admin.php" class="btn btn-primary">Logout</a>
        </div>
        <div class="container">
            <div class="col-md-4">
                <div action="/action_page.php" method="get">
                    <div class="thumbnail">
                        <a href="#" target="_blank">
                        <?php if($admin['adminPicture'] == NULL){ ?>
                            <img src="images/default.png" alt="Lights" style="width:50%" float="left">
                        <?php } else { ?>
                            <img src="images/admin/<?php echo $admin['adminPicture']; ?>" alt="Lights" style="width:50%" float="left">
                        <?php } ?>
                            <div class="caption">
                                <p><?php echo $admin['adminName']; ?></p>

                                <p>Email: <?php echo $admin['adminEmail']; ?></p>
                                <p>Contact: <?php echo $admin['adminContact']; ?></p>
                            </div>
                        </a>
                        <div class="btn-group">
                            <a href="editadmin.php?adminId=<?php echo $adminId?>"> <button type="button" class="btn btn-primary">Edit
                                    Details</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="btn-container">
                <a href="patients/index.php" class="btn btn-primary">Registration</a>
                    <a href="patients/index.php" class="btn btn-primary">Patients</a>
                    <a href="test-labs/index.php" class="btn btn-primary">Test Labs</a>
                    <a href="test-report/index.php" class="btn btn-primary">Test Report</a>
                    <a href="receptionist/index.php" class="btn btn-primary">Receptionist</a>
                </div>

             </div>
        </div>

    </div>


</body>
</html>