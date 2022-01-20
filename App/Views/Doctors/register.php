<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <a href="<?php echo URLROOT; ?>">Main Page</a>

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Doctor Registration</p>

                <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/doctor/register" method='POST'>
                
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>"/>
                            
                            <span style="color: red"><?php echo $data['name_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $data['email']?>"/>
                            <span style="color: red"><?php echo $data['email_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">Password </label>
                            <input class="form-control" type="password" name="password" value="<?php echo $data['password']?>">
                            <span style="color: red"><?php echo $data['password_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="confirm_password">Confirm Password </label>
                            <input class="form-control" type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>">
                            <span style="color: red"><?php echo $data['confirm_password_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="moh-area">MOH Area </label>
                            <input class="form-control" type="text" name="moh_area" value="<?php echo $data['moh_area']?>">
                            <span style="color: red"><?php echo $data['moh_area_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label"  for="contact_no">Contact No </label>
                            <input class="form-control" type="text" name="contact_no" value="<?php echo $data['contact_no']?>" required>
                            <span style="color: red"><?php echo $data['contact_no_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="NIC">NIC </label>
                            <input class="form-control" type="text" name="NIC" value="<?php echo $data['NIC']?>">
                            <span style="color: red"><?php echo $data['NIC_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="slmc_reg_no">SLMC reg no </label>
                            <input class="form-control" type="text" name="slmc_reg_no" value="<?php echo $data['slmc_reg_no']?>">
                            <span style="color: red"><?php echo $data['slmc_reg_no_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input class="btn btn-primary" type="submit" value="register">
                    </div>

                    <div class="text-center" >
                        <a href="<?php echo URLROOT; ?>/doctor/login">Already have an account? Login</a>
                    </div>

                </form>
                </div>

                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    
                 
                <img src="https://media.istockphoto.com/vectors/doctor-with-stethoscope-and-medical-test-medic-icon-in-flat-style-vector-id1129223269?k=20&m=1129223269&s=612x612&w=0&h=rfQO9jF2s8OZCtxV4CcRhF4hMPxg6_h2Au7D7bcBTwk=" class="img-fluid" alt="Sample image">
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