<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Admin - Home Isolation System</title>
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
      <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
    </ol>
  </div>
</nav>
<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register a doctor</h2>
                                <form action="<?php echo URLROOT;?>/admin/user/register-doctor" method="POST">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="text" name="name" placeholder="Enter name">
                                            <label class="form-label" for=""><i class="fa fa-user fa-lg me-3 fa-fw"></i>Name</label>
                                            <span style="color: red"><?php echo $data['name_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="text" name="email" placeholder="Enter email">
                                            <label class="form-label" for=""><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email</label>
                                            <span style="color: red"><?php echo $data['email_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="password" name="password" placeholder="Enter password">
                                            <label class="form-label" for=""><i class="fa fa-key fa-lg me-3 fa-fw"></i>Password</label>
                                            <span style="color: red"><?php echo $data['password_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm password">
                                            <label class="form-label" for=""><i class="fa fa-key fa-lg me-3 fa-fw"></i> Password</label>
                                            <span style="color: red"><?php echo $data['confirm_password_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="text" name="moh_area" placeholder="Enter MOH area">
                                            <label class="form-label" for=""><i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>MOH Area</label>
                                            <span style="color: red"><?php echo $data['moh_area_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="text" name="NIC" placeholder="Enter NIC">
                                            <label class="form-label" for=""><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>NIC</label>
                                            <span style="color: red"><?php echo $data['NIC_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="text" name="slmc_reg_no" placeholder="Enter SLMC Reg No">
                                            <label class="form-label" for=""><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>SLMC Reg No</label>
                                            <span style="color: red"><?php echo $data['slmc_reg_no_err']?></span>
                                        </div>
                                    </div>

                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="gender">Gender</label>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="d-flex justify-content-around">
                                            <div class="p-1">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                                <i class="fa fa-male fa-lg fa-fw"></i>
                                                <label class="form-check-label" for="Male">Male</label>
                                            </div>
                                            <div class="p-1">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                                <i class="fa fa-female fa-lg fa-fw"></i>
                                                <label class="form-check-label" for="Female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="date" name="birthday" placeholder="Enter Birthday">
                                            <label class="form-label" for=""><i class="fa fa-calendar fa-lg me-3 fa-fw"></i>Birthday</label>
                                            <span style="color: red"><?php echo $data['birthday_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input class="form-control" type="text" name="contact_no" placeholder="Enter Contact No">                                           
                                            <label class="form-label" for=""><i class="fa fa-mobile fa-lg me-3 fa-fw"></i>Contact No</label>
                                            <span style="color: red"><?php echo $data['contact_no_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" class="btn btn-primary " value="Register">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img src="https://cdn.dribbble.com/users/1475931/screenshots/10848109/media/cceef0db52d353328115239e84f2b7b3.png" width=700 height=700 class="img-fluid" alt="Sample image" style="border-radius: 50px;"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>