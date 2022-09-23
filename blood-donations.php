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
    <script src="js/donation-events.js"></script>

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
            <li class="nav-item mx-4 ">
                <a class="nav-link" href="blood-banks.php">Blood Banks</a>
            </li>
            <li class="nav-item mx-4 active">
                <a class="nav-link" href="blood-donations.php">Blood Donations <span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
    </nav>

    <!-- HOME CONTENT -->    
    <div class="home-content row px-0 my-4 mx-0">
        
        <!-- BANK LISTS -->    
        <div class="table-container table-responsive col-sm-12 mb-3">
            <h5>Blood Donations</h5>
            <hr />
            <div class="text-right">
                <input id='txt-search' type='text' class='form-control-sm' placeholder='Search...' />
            </div>
        
            <table id="table-blood-donations" class="table table-hover table-dark mt-3">
                
            </table>
            <small class="text-success">* Click a row for more details</small>
        </div>

    </div>

    <!-- More Details Modal -->
    <div id="modal-more-details" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Donation Details <small style="color: #aaa">(Donation ID: <span id="title-id">1</span>)</small></h5>
                <button id="btn-modalx" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- MODAL FORM-->
            <div class="modal-body">
                <form id="form-edit" class="form row">
                    <!-- -->
                    <div class="col-sm-12">
                        <div class="btn-containers text-center">
                            <button id="btn-edit-details" type="button" class="btn btn-primary btn-sm">Edit</button>
                            <button id="btn-delete" type="button" class="btn btn-danger btn-sm">Delete</button>
                            <button id="btn-update" type="button" class="btn btn-success btn-sm" style="display:none">Update</button>
                            <button id="btn-cancel-edit" type="button" class="btn btn-secondary btn-sm" style="display:none">Cancel Edit</button>
                        </div>
                        <h6 class="text-danger">Donation Details</h6>
                        <hr />
                        <div class="mb-3">
                            <label for="txt-ebankname" class="form-label">Bank Name <span class="text-warning">*<span></label>
                            <select id="txt-ebankname" class="form-control">
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txt-ebloodgroup" class="form-label">Blood Group <span class="text-warning">*<span></label>
                            <select id="txt-ebloodgroup" class="form-control">
                                <option value="A+" >A+</option>
                                <option value="A-" >A-</option>
                                <option value="B+" >B+</option>
                                <option value="B-" >B-</option>
                                <option value="AB+" >AB+</option>
                                <option value="AB-" >AB-</option>
                                <option value="O+" >O+</option>
                                <option value="O-" >O-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt-edod" class="form-label">Date of Donation <span class="text-warning">*<span></label>
                            <input id="txt-edod" type="date" class="form-control" />
                        </div>
                    </div>

                    <!-- -->
                    <div class="col-sm-6">
                        <h6 class="mt-4 text-success">Donor Personal Information</h6>
                        <hr />
                        <div class="form-group">
                            <label for="txt-elastname" class="form-label">Last Name <span class="text-warning">*<span></label>
                            <input id="txt-elastname" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="txt-efirstname" class="form-label">First Name <span class="text-warning">*<span></label>
                            <input id="txt-efirstname" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="txt-emidname" class="form-label">Middle Name</label>
                            <input id="txt-emidname" type="text" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="txt-esex" class="form-label">Sex <span class="text-warning">*<span></label>
                            <select id="txt-esex" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt-edob" class="form-label">Date of Birth <span class="text-warning">*<span></label>
                            <input id="txt-edob" type="date" class="form-control" />
                        </div>
                    </div>

                    <!-- -->
                    <div class="col-sm-6">
                        <h6 class="mt-4 text-primary">Donor Contact Information</h6>
                        <hr />
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
                            <label for="txt-emobile" class="form-label">Mobile Number <span class="text-warning">*<span></label>
                            <input id="txt-emobile" type="number" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="txt-eemail" class="form-label">Email <span class="text-warning">*<span></label>
                            <input id="txt-eemail" type="text" class="form-control" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btn-modal-close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>




    <!-- Button trigger modal -->
    <button id="btn-add-donation" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Add Donation Details
    </button>

    <!-- Add Donation Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add a Blood Donation Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <!-- MODAL FORM-->
            <div class="modal-body">
                <form id="form-add" class="form">
                    <!-- -->
                    <h6 class="text-danger">Donation Details</h6>
                    <hr />
                    <div class="mb-3">
                        <label for="txt-bankname" class="form-label">Bank Name <span class="text-warning">*<span></label>
                        <select id="txt-bankname" class="form-control">
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txt-bloodgroup" class="form-label">Blood Group <span class="text-warning">*<span></label>
                        <select id="txt-bloodgroup" class="form-control">
                            <option value="A+" >A+</option>
                            <option value="A-" >A-</option>
                            <option value="B+" >B+</option>
                            <option value="B-" >B-</option>
                            <option value="AB+" >AB+</option>
                            <option value="AB-" >AB-</option>
                            <option value="O+" >O+</option>
                            <option value="O-" >O-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txt-dod" class="form-label">Date of Donation <span class="text-warning">*<span></label>
                        <input id="txt-dod" type="date" class="form-control" />
                    </div>
                    
                    <!-- -->
                    <h6 class="mt-4 text-success">Donor Personal Information</h6>
                    <hr />
                    <div class="form-group">
                        <label for="txt-lastname" class="form-label">Last Name <span class="text-warning">*<span></label>
                        <input id="txt-lastname" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-firstname" class="form-label">First Name <span class="text-warning">*<span></label>
                        <input id="txt-firstname" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-midname" class="form-label">Middle Name</label>
                        <input id="txt-midname" type="text" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="txt-sex" class="form-label">Sex <span class="text-warning">*<span></label>
                        <select id="txt-sex" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txt-dob" class="form-label">Date of Birth <span class="text-warning">*<span></label>
                        <input id="txt-dob" type="date" class="form-control" />
                    </div>
                    
                    <!-- -->
                    <h6 class="mt-4 text-primary">Donor Contact Information</h6>
                    <hr />
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
                        <label for="txt-mobile" class="form-label">Mobile Number <span class="text-warning">*<span></label>
                        <input id="txt-mobile" type="number" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="txt-email" class="form-label">Email <span class="text-warning">*<span></label>
                        <input id="txt-email" type="text" class="form-control" />
                    </div>
                </form>
                <span class="text-warning text-left text-sm font-weight-bold">* required<span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="submit-donation" type="button" class="btn btn-success">Add Blood Donation</button>
            </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

</body>
</html>