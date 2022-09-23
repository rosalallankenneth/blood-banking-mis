<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css">

    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#home-table-banks").load("api/home-displaybanks.php");
            $("#home-table-recent").load("api/home-displayrecent.php");
        });
    </script>

    <title>Blood Bank Management Information System</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <div class="row">
                <h4 class="col-12 m-0 py-0">
                    <span class="color-theme">Blood</span>Bank
                </h4>
                <small class="col-12 m-0 py-0" style="font-size: 13px; color: #bbb">Management Information System</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-auto" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-0 ml-auto mt-2 mt-lg-0">
            <li class="nav-item mx-4 active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mx-4 ">
                <a class="nav-link" href="blood-banks.php">Blood Banks</a>
            </li>
            <li class="nav-item mx-4 ">
                <a class="nav-link" href="blood-donations.php">Blood Donations</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron bg-light">
    </div>

    <!-- HOME CONTENT -->    
    <div class="home-content row px-0 mx-0">
        <div class="col-lg-1 col-md-0"></div>
        
        <!-- BANK LISTS -->    
        <div class="col-lg-5 col-md-12 col-sm-12 table-responsive">
            <h5>Blood Banks List</h5>
            <table id="home-table-banks" class="table table-hover table-dark mt-3">
                
            </table>
            <a href="blood-banks.php" class="btn btn-success btn-block mb-4 ml-auto mr-0">View all</a>
        </div>

        <!-- RECENT DONATIONS -->    
        <div class="col-lg-5 col-md-12 col-sm-12 table-responsive">
            <h5>Recent Blood Donations</h5>
            <table id="home-table-recent" class="table table-hover table-dark mt-3">
                
            </table>
            <a href="blood-donations.php" class="btn btn-primary btn-block mb-4 ml-auto mr-0">View all</a>
        </div>

        <div class="col-lg-1 col-md-0"></div>
    </div>

    <!--- FOOTER -->
    <footer class="footer mt-4 bg-dark text-light pt-4 pb-3 px-5">
        <h4 class="text-center">About</h4>
        <p class="pt-3 text-justify">
            This project is a prototype of a proposed <span class="text-warning">Blood Banking Management Information System</span>. This prototype only includes the main functionalities of the system, which are to Create, Retrieve, Update, and Delete Blood Bank and Blood Donation Information. It does not have the fundamental security features such as user Authentication and Authorization and server side Form Validation, to name a few. To be specific, this is in the first incremental phase of the project.
        </p>
        <p class="text-right">
            <small>- Allan Kenneth Rosal, <span class="text-success">Developer<span></small>
        </p>
    </footer>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

</body>
</html>