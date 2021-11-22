<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME QURANTINE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<section class="vh-auto" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registration Info</p>

                <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/adult-patient/register" method='POST'>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                     
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="name" value="<?php echo $data['name']?>" class="form-control" placeholder="Patient Name" required>
                      <span style="color:red"><?php echo $data['name_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" value="<?php echo $data['email']?>" class="form-control" placeholder="Email Address" required >
                      <span style="color:red"><?php echo $data['email_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-birthday-cake fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="date" name="birthday" value="<?php echo $data['birthday']?>" class="form-control" placeholder="Birth Day" required>
                    </div>
                  </div>

                  <!-- <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-check form-check-inline">
                        <i class="fa fa-male fa-lg me-3 fa-fw"></i>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        
                        
                        
                    </div>
                    <div class="form-check form-check-inline">
                        <i class="fa fa-female fa-lg me-3 fa-fw"></i>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    </div>
                  </div> -->

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="NIC" value="<?php echo $data['NIC']?>" class="form-control" placeholder="NIC Number" readonly>
                      
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="mobile" value="<?php echo $data['mobile']?>" class="form-control" placeholder="Contact Number">
                      
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" value="<?php echo $data['password']?>" class="form-control" placeholder="Password" required>
                      
                      <span style="color:red"><?php echo $data['password_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                    
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>" class="form-control" placeholder="Confirm password" required>
                      
                      <span style="color:red"><?php echo $data['confirm_password_err']?></span>
                    </div>
                  </div>

                  <input type="hidden" name="id_checked" value="yes">
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <!-- <button type="button" class="btn btn-primary btn-lg" value="register">Register</button>  -->
                    <!-- <input type="submit" value="Register">  -->
                    <input type="submit" class="btn btn-primary ms-auto" value="Register">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                

                 <img src="https://www.tenethealth.com/images/global/newsroom-ccb/cardiology-heart-care-technology-doctor.jpg?sfvrsn=befe083e_1" width=700 height=700 class="img-fluid" alt="Sample image"> 

              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-5 text-muted">
						Copyright &copy; Code Devours 
				</div>
      </div>
    </div>
  </div>
</section>

</body>