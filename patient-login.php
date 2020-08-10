<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patient Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .form-signin {
            max-width: 450px;
            width: 90%;
            margin: 0 auto;
            text-align: center;
        }

        .form-signin input {
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <form class="form-signin" method="POST" action="patient-login-action.php">
            <img class="mb-4" src="images/logo/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Patient LogIn</h1>
            <?php if(isset($_GET['error']) && $_GET['error']==3 ) { ?>
            <div class="alert alert-danger" role="alert">
                Invalid CNIC or Password
            </div>
            <?php } ?>
            <label for="cnic" class="sr-only">CNIC</label>
            <input type="text" id="cnic" name="cnic" class="form-control" placeholder="Enter CNIC" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">LogIn</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>
    </div>

</body>

</html>