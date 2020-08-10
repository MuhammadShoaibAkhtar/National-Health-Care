<!DOCTYPE HTML>
<html>

<head>
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            display: block;
            height: 750px;
            min-width: 100%;
            width: 100%;
            max-width: 100%;
            line-height: 1;
        }

        .marketing {
            margin-top: 30px;
        }

        .marketing .col-lg-6 {
            margin-bottom: 20px;
            text-align: center;
        }

        .marketing h2 {
            font-weight: 400;
        }

        .marketing .col-lg-6 p {
            margin-right: 10px;
            margin-left: 10px;
        }

        .navbar {
            min-height: 80px;
        }

        .navbar-nav>li>a {
            padding-top: 0px;
            padding-bottom: 0px;
            line-height: 80px;
        }

        @media (max-width: 767px) {
            .navbar-nav>li>a {
                line-height: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default" style="margin-bottom: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="National Health Care Assistant " height="50px" src="images/logo/logo.png" />
                </a>
                <p class="navbar-text" style="font-size: 2.5em;">National Health Care Assistant</p>
            </div>
        </div>
    </nav>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/slider-im1.jpeg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="images/slider-im2.jpeg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="images/slider-im3.jpeg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container marketing">

        <div class="row">
            <div class="col-lg-6">
                <img class="img-circle" src="images/grid-img3.png" alt="Generic placeholder image" width="140"
                    height="140">
                <h2>Patients</h2>
                <p></p>
                <p><a class="btn btn-default" href="patient-login.php" role="button">Login</a></p>
            </div>
           
            <div class="col-lg-6">
                <img class="img-circle" src="images/grid-img2.png" alt="Generic placeholder image" width="140"
                    height="140">
                <h2>Admin Login</h2>
                <p></p>
                <p><a class="btn btn-default" href="admin-login.php" role="button">Login</a></p>
            </div>
        </div>
        <footer style="margin-top: 50px;">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2020 Hospital Name. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
</body>

</html>