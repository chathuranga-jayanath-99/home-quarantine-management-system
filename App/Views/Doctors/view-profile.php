<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
    <?php
    $page = 'view-profile';
    $subPage = '';
    include_once 'includes/navbar.php';
    ?>

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
                                    echo '<img class="rounded-circle mt-5" width="100px" src="https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png">';
                                }
                                else if (strcmp($doctor['gender'], 'Female') == 0){
                                    echo '<img class="rounded-circle mt-5" width="100px" src="https://previews.123rf.com/images/grgroup/grgroup1705/grgroup170503271/78206085-colorful-portrait-half-body-of-female-doctor-vector-illustration.jpg">';
                                }
                            ?>
                            <span class="font-weight-bold"><?php echo $doctor['name']; ?></span>
                            <span class="text-black-50"><?php echo $doctor['email']; ?></span>
                            <span><div class="mt-5 text-center"><a href="<?php echo URLROOT?>/doctor/update" class="btn btn-primary">Edit Profile</a></div></span>
                            <span><div class="mt-3 text-center"><a href="<?php echo URLROOT?>/doctor/reset-password" class="btn btn-warning">Change Password</a></div></span>
                        </div>
                    </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">My Profile</h4>
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
            <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
        </div>
        
        </div>
    </div>
</div>

</section>
</body>

</html>