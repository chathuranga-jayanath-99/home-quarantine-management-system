<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <div class="container-fluid justify-content-left">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin/user">
      <img src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['admin_name']; ?>
    </a>
    <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor" class="navbar-brand ms-5"><i class="fa fa-arrow-circle-left fa-lg me-3 fa-fw"></i></a>
    <ol class="breadcrumb navbar-nav me-auto mb-2 mb-lg-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Manage Doctors</li>
      <li class="breadcrumb-item active" aria-current="page">View Doctor</li>
    </ol>
  </div>
</nav>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php
                                if (strcmp($doctor['gender'], 'Male') == 0){
                                    echo '<img class="rounded-circle mt-5" width="100px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">';
                                }
                                else if (strcmp($doctor['gender'], 'Female') == 0){
                                    echo '<img class="rounded-circle mt-5" width="100px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqTjHOCWWdu_PhEoiAWJeEMZ2lecPS8WksQw&usqp=CAU">';
                                }
                            ?>
                            <span class="font-weight-bold"><?php echo $doctor['name']; ?></span>
                            <span class="text-black-50"><?php echo $doctor['email']; ?></span>
                            <!--span><div class="mt-5 text-center"><a href="<?php //echo URLROOT?>/doctor/update" class="btn btn-primary">Edit Profile</a></div></span>
                            <span><div class="mt-3 text-center"><a href="<?php //echo URLROOT?>/doctor/reset-password" class="btn btn-warning">Change Password</a></div></span-->
                        </div>
                    </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">View Doctor</h4>
                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-md-12">
                            <label class="labels">Name</label>
                            <p class="text-primary"><?php echo $doctor['name']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Email Address</label>
                            <p class="text-primary"><?php echo $doctor['email']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">NIC</label>
                            <p class="text-primary"><?php echo $doctor['NIC']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Gender</label>
                            <p class="text-primary"><?php echo $doctor['gender']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Birthday</label>
                            <p class="text-primary"><?php echo $doctor['birthday']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">MOH area</label>
                            <p class="text-primary"><?php echo $doctor['moh_area']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">SLMC No</label>
                            <p class="text-primary"><?php echo $doctor['slmc_reg_no']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Contact No</label>
                            <p class="text-primary"><?php echo $doctor['contact_no']; ?></p>
                        </div>
                    </div>
            
            </div>
        </div>
            
                </div>
            </div>
        </div>

        <div class="text-center mt-5 text-muted pt-auto">
            Copyright &copy; Code Devours
        </div>
        
        </div>
    </div>
</div>

</section>
</body>

</html>