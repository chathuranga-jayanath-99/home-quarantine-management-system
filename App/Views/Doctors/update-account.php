<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
    <?php
    $page = 'update';
    $subPage = 'profile';
    include_once 'includes/navbar.php'; 
    ?>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Profile</h2>

                    <form action="<?php echo URLROOT?>/doctor/update" method="POST">

                        <div class="d-flex flex-row align-items-center mb-4">   
                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>"/>
                                
                                <span style="color:red;"><?php echo $data['name_err']?></span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $data['email']?>"/>
                                <span style="color:red;"><?php echo $data['email_err']?></span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="moh-area">MOH Area </label>
                                <input class="form-control" type="text" name="moh_area" value="<?php echo $data['moh_area']?>">
                                <span style="color:red;"><?php echo $data['moh_area_err']?></span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label"  for="contact_no">Contact No </label>
                                <input class="form-control" type="text" name="contact_no" value="<?php echo $data['contact_no']?>" required>
                                <span style="color:red;"><?php echo $data['contact_no_err']?></span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="NIC">NIC </label>
                                <input class="form-control" type="text" name="NIC" value="<?php echo $data['NIC']?>" readonly>
                                <span style="color:red;"><?php echo $data['NIC_err']?></span>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="slmc_reg_no">SLMS reg no </label>
                                <input class="form-control" type="text" name="slmc_reg_no" value="<?php echo $data['slmc_reg_no']?>" readonly>
                                <span style="color:red;"><?php echo $data['slmc_reg_no_err']?></span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-birthday-cake fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="birthday">Birthday</label>
                                <input class="form-control" type="date" name="birthday" value="<?php echo $data['birthday']?>">
                                <span style="color:red;"><?php echo $data['birthday_err']?></span>
                            </div>
                        </div>

                        <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="gender">Gender</label>
                            </div>

                        <div class="d-flex flex-row align-items-center mb-4">


                            <div class="d-flex justify-content-around">
                                <div class="p-1">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($data['gender'] == 'Male') {echo 'checked';} ?> >
                                    <i class="fa fa-male fa-lg fa-fw"></i>
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="p-1">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" id="female" <?php if($data['gender'] == 'Female') {echo 'checked';} ?> >
                                    <i class="fa fa-female fa-lg fa-fw"></i>
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                            </div>
                            
                        </div>


                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input class="btn btn-primary" type="submit" value="Update Account">
                        </div>

                    </form>

            </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://image.freepik.com/free-vector/people-wearing-medical-mask_52683-35467.jpg" width=700 height=700 class="img-fluid" alt="Sample image" style="border-radius: 50px;"> 
                        </div>

                        </div>  
                </div>
            </div>

            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/doctor/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>

            </div>
        </div>
    </div>
    

</section>
</body>
</html>