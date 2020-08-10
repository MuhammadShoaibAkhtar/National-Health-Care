<?php
    session_start();
    require("../functions.php");


    if(!isset($_SESSION['adminId'])) {
        header('Location: admin-login.php');
        die();
    }


    $pageNum = 0;
    $limit = 20;
    

    if ( isset($_GET['pageNum']) ) {
        $pageNum = $_GET['pageNum'];
    }
    
    $offset = $pageNum * $limit;

    $patients = getPatients( $offset,  $limit);

    // echo "<pre>";
    // var_dump($patients);
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
    <h1><a href="../adminportal.php" style="text-decoration:none; color: white;">Health care Assistant</a></h1>
        <a href="../logout-admin.php" class="btn btn-primary">Logout</a>
    </div>
    <div class="container">
        <div class="col-md-12">
        <h1>Patients</h1>
            <div class="action-btns">
                <a href="add.php" class="btn btn-primary pull-right">Add Patient</a>
            </div>
            <table class="table" id="prescription-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">patientId</th>
                        <th scope="col">patientName</th>
                        <th scope="col">patientAddress</th>
                        <th scope="col">patientDob</th>
                        <th scope="col">patientPicture</th>
                        <th scope="col">patientCnic</th>
                        <th scope="col">patientPassword</th>
                        <th scope="col">patientGender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($patients); $i++) { ?>
                    <tr>
                        <td><?php echo $patients[$i]['patientId']; ?></td>
                        <td><?php echo $patients[$i]['patientName']; ?></td>
                        <td><?php echo $patients[$i]['patientAddress']; ?></td>
                        <td><?php echo $patients[$i]['patientDob']; ?></td>
                        <td><?php echo $patients[$i]['patientPicture']; ?></td>
                        <td><?php echo $patients[$i]['patientCnic']; ?></td>
                        <td><?php echo $patients[$i]['patientPassword']; ?></td>
                        <td><?php echo $patients[$i]['patientGender']; ?></td>
                        <td><a href="edit.php?patientId=<?php echo $patients[$i]['patientId']; ?>">Edit</a></td>
                    </tr>
                    <?php } ?>              
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <div class="btn-group" role="group">
                        <?php if($pageNum > 0){ ?>
                        <a href="index.php?pageNum=<?php echo $pageNum - 1; ?>" class="btn btn-default">Previous</a>
                        <?php } ?>
                        <a href="index.php?pageNum=<?php echo $pageNum + 1; ?>" class="btn btn-default">Next</a>
                    </div>
                </div>
                <div class="col-md-4">Current Page: <?php echo $pageNum+1; ?></div>
            </div>
        </div>
    </div>

</body>
</html>