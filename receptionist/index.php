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

    $receptionists = getReceptionists( $offset,  $limit);

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>View Test Labs</title>
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
        <h1>Receptionists</h1>
            <div class="action-btns">
                <a href="add.php" class="btn btn-primary pull-right">Add Test Lab</a>
            </div>
            <table class="table" id="prescription-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">receptionistId</th>
                        <th scope="col">receptionistName</th>
                        <th scope="col">receptionistEmail</th>
                        <th scope="col">receptionistPassword</th>
                        <th scope="col">receptionistContact</th>
                        <th scope="col">receptionistPicture</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($receptionists); $i++) { ?>
                    <tr>
                        <td><?php echo $receptionists[$i]['receptionistId']; ?></td>
                        <td><?php echo $receptionists[$i]['receptionistName']; ?></td>
                        <td><?php echo $receptionists[$i]['receptionistEmail']; ?></td>
                        <td><?php echo $receptionists[$i]['receptionistPassword']; ?></td>
                        <td><?php echo $receptionists[$i]['receptionistContact']; ?></td>
                        <td><?php echo $receptionists[$i]['receptionistPicture']; ?></td>
                        <td><a href="edit.php?receptionistId=<?php echo $receptionists[$i]['receptionistId']; ?>">Edit</a></td>
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