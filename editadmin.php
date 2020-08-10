<?php
    session_start();
    require("functions.php");

    $adminId = NULL;
    if(isset($_SESSION['adminId'])) {
        $adminId = $_SESSION['adminId'];
    } else {
        die("404 - Not Found");
    }

    $admin = getAdmin($adminId);


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
        <h2> Edit Admin</h2>
        <form action="update-admin.php" method="POST">
            <input type="hidden" name="adminId" value="<?php echo $adminId; ?>" />
            <div class="form-group">
                <label for="adminName">Admin Name:</label>
                <input type="text" class="form-control" id="adminName" value="<?php echo $admin["adminName"]; ?>" name="adminName" />
            </div>
            <div class="form-group">
                <label for="adminContact">Contact:</label>
                <input type="text" class="form-control" id="adminContact" value="<?php echo $admin["adminContact"] ?>" name="adminContact">
            </div>
            <div class="form-group">
                <label for="adminEmail">Email:</label>
                <input type="text" class="form-control" id="adminEmail" value="<?php echo $admin["adminEmail"] ?>" name="adminEmail">
            </div>
            <div class="form-group">
                <label for="adminPassword">Password:</label>
                <input type="text" class="form-control" id="adminPassword" value="<?php echo $admin["adminPassword"] ?>" name="adminPassword">
            </div>

    
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>