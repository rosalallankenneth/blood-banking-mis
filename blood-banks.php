<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style-blood-donations.css">

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bank-events.js"></script>

    <title>Blood Donations</title>
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
            <li class="nav-item mx-4">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item mx-4 active">
                <a class="nav-link" href="blood-banks.php">Blood Banks <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="blood-donations.php">Blood Donations</a>
            </li>
            </ul>
        </div>
    </nav>

    <!-- HOME CONTENT -->    
    <div class="home-content row px-0 my-4 mx-0">
        
        <!-- BANK LISTS -->    
        <div class="table-container table-responsive col-sm-12 mb-3">
            <h5>Blood Banks</h5>
            <table id="table-blood-banks" class="table table-dark mt-3">
                
            </table>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="btn-add-bank" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Add Blood Bank
    </button>

    <!-- Add Bank Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add a Blood Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <!-- MODAL FORM-->
            <div class="modal-body">
                <form id="form-add" class="form">
                    <!-- -->
                    <div class="form-group">
                        <label for="txt-bankname" class="form-label">Bank Name <span class="text-warning">*<span></label>
                        <input id="txt-bankname" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-barangay" class="form-label">Barangay <span class="text-warning">*<span></label>
                        <input id="txt-barangay" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-city" class="form-label">City <span class="text-warning">*<span></label>
                        <input id="txt-city" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-province" class="form-label">Province <span class="text-warning">*<span></label>
                        <input id="txt-province" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-phoneno" class="form-label">Phone Number <span class="text-warning">*<span></label>
                        <input id="txt-phoneno" type="text" class="form-control" />
                    </div>
                </form>
                <span class="text-warning text-left text-sm font-weight-bold">* required<span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="submit-bank" type="button" class="btn btn-success">Add Blood Bank</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Edit Bank Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditTitle">Edit Blood Bank Details <small style="color: #aaa">(Bank ID: <span id="title-id">1</span>)</small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <!-- MODAL FORM-->
            <div class="modal-body">
                <form id="form-add" class="form">
                    <!-- -->
                    <div class="form-group">
                        <label for="txt-ebankname" class="form-label">Bank Name <span class="text-warning">*<span></label>
                        <input id="txt-ebankname" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-ebarangay" class="form-label">Barangay <span class="text-warning">*<span></label>
                        <input id="txt-ebarangay" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-ecity" class="form-label">City <span class="text-warning">*<span></label>
                        <input id="txt-ecity" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-eprovince" class="form-label">Province <span class="text-warning">*<span></label>
                        <input id="txt-eprovince" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-ephoneno" class="form-label">Phone Number <span class="text-warning">*<span></label>
                        <input id="txt-ephoneno" type="text" class="form-control" />
                    </div>
                </form>
                <span class="text-warning text-left text-sm font-weight-bold">* required<span>
            </div>
            <div class="modal-footer">
                <button id='btn-close' type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="btn-update" type="button" class="btn btn-success">Update</button>
            </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

</body>
</html>