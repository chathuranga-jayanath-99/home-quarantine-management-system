<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - PHIs - Home Isolation System</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <div class="container-fluid justify-content-left">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/adult-patient">
      <img src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['admin_name']; ?>
    </a>
    <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI" class="navbar-brand ms-5"><i class="fa fa-arrow-circle-left fa-lg me-3 fa-fw"></i></a>
    <ol class="breadcrumb navbar-nav me-auto mb-2 mb-lg-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Manage PHIs</li>
      <li class="breadcrumb-item active" aria-current="page">Add PHI</li>
    </ol>
  </div>
</nav>

<section class="vh-auto py-5" style="background-color: #eee; min-height:100vh;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-10">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">PHI Registration</p>

                <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/admin/user/register-PHI" method='POST'>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input onclick="checkName()" onblur="checkName()" onchange="checkName()" id="name" type="text" name="name" value="<?php echo $data['name']?>" class="form-control" placeholder="Name" required>
                      <label class="form-label" for="name"><i class="fa fa-user fa-lg me-3 fa-fw"></i>Name</label>
                      <span id="name_err" style="color:red"><?php echo $data['name_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input onclick="checkEmail()" onblur="checkEmail()" onchange="checkEmail()" id="email" type="email" name="email" value="<?php echo $data['email']?>" class="form-control" placeholder="Email" required>
                      <label class="form-label" for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email Address</label>
                      <span id="email_err" style="color:red"><?php echo $data['email_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input type="text" name="moh_area" value="<?php echo $data['moh_area']?>" class="form-control"  placeholder="MOH Area" required>
                      <label class="form-label" for="moh_area"><i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>MOH Area</label>
                      <span style="color:red"><?php //echo $data['moh_area_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input type="text" name="PHI_station" value="<?php echo $data['PHI_station']?>" class="form-control" placeholder="PHI Range/Station" required>
                      <label class="form-label" for="PHI_station"><i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>PHI Range/Station</label>
                      <span style="color:red"><?php //echo $data['PHI_station_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input type="text" name="PHI_id" value="<?php echo $data['PHI_id']?>" class="form-control" placeholder="PHI ID" required>
                      <label class="form-label" for="PHI_station"><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>PHI ID</label>
                      <span style="color:red"><?php //echo $data['PHI_id_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input onclick="checkNIC()" onchange="checkNIC()" onblur="checkNIC()" id="NIC" type="text" name="NIC" value="<?php echo $data['NIC']?>" class="form-control" placeholder="NIC Number" required>
                      <label class="form-label" for="NIC"><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>NIC Number</label>
                      <span id="nic_err" style="color:red"><?php echo $data['nic_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input type="text" name="contact_number" value="<?php echo $data['contact_number']?>" class="form-control" placeholder="Contact Number" required>
                      <label class="form-label" for="contact_number"><i class="fa fa-phone fa-lg me-3 fa-fw"></i>Contact Number</label>
                      <span style="color:red"><?php //echo $data['contact_number_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input onclick="checkPassword()" onblur="checkPassword()" onchange="checkPassword()" id="password" type="password" name="password" value="<?php echo $data['password']?>" class="form-control" placeholder="Password" required>
                      <label class="form-label" for="password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Password</label>
                      <span id="password_err" style="color:red"><?php echo $data['password_err']?></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline form-floating flex-fill mb-0">
                      <input onclick="checkConfPassword()" onblur="checkConfPassword()" onchange="checkConfPassword()" id="confirm_password" type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>" class="form-control" placeholder="Confirm your password" />
                      <label class="form-label" for="confirm_password"><i class="fa fa-lock fa-lg me-3 fa-fw"></i>Confirm your password</label>
                      <span id="confirm_password_err" style="color:red"><?php echo $data['confirm_password_err']?></span>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                     <button type="submit" class="btn btn-primary btn-lg" value="register">Register</button> 
                     <!-- <input type="submit" value="Register">  -->
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                

                 <img src="https://cdn.dribbble.com/users/1475931/screenshots/10848109/media/cceef0db52d353328115239e84f2b7b3.png" width=700 height=700 class="img-fluid" alt="Sample image"> 

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
<script src="../../static/js/validation-script.js"></script>
    <script>
        document.getElementById("reg-form").addEventListener('submit', submitRoutine);

        function checkName() {
            var name = document.getElementById("name");
            var name_err = document.getElementById('name_err');
            if (!validator.validateName(name.value)){
                name_err.innerHTML = "Enter a valid name";
            }
            else{
                name_err.innerHTML = ""
            }
        }

        function checkNIC() {
            var nic = document.getElementById("NIC");
            var nic_err = document.getElementById('nic_err');
            var nic_c = nic.value.toUpperCase();
            nic.value = nic_c;
            if (!validator.validateNIC(nic_c)){
                nic_err.innerHTML = "Enter a valid NIC";
            }
            else{
                nic_err.innerHTML = ""
            }
        }

        function checkEmail() {
            var email = document.getElementById("email");
            var email_err = document.getElementById('email_err');
            if (!validator.validateEmail(email.value)){
                email_err.innerHTML = "Enter a valid email";
            }
            else{
                email_err.innerHTML = "";
            }
        }

        function checkPassword() {
            var password = document.getElementById('password');
            var password_err = document.getElementById('password_err');
            if (password.value.length == 0) {
                password_err.innerHTML = "Please enter a password";
            } else if (password.value.length < 6) {
                password_err.innerHTML = "Password must be at least 6 characters";
            } else {
                password_err.innerHTML = "";
                checkConfPassword();
            }
        }

        function checkConfPassword() {
            var password = document.getElementById('password');
            var confirm_password = document.getElementById('confirm_password');
            var password_err = document.getElementById('password_err');
            var confirm_password_err = document.getElementById('confirm_password_err');
            if (confirm_password.value.length == 0) {
                confirm_password_err.innerHTML = "Please enter password again";
            } else if (password.value.length >= 6 && password.value == confirm_password.value){
                password_err.innerHTML = "";
                confirm_password_err.innerHTML = "";
            } else if (password.value == confirm_password.value) {
                confirm_password_err.innerHTML = "";
            } else {
                confirm_password_err.innerHTML = "Passwords do not match";
            }
        }

        function submitRoutine(e){

            var password = document.getElementById('password');
            var confirm_password = document.getElementById('confirm_password');
            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var nic = document.getElementById("NIC");

            var password_err = document.getElementById('password_err');
            var confirm_password_err = document.getElementById('confirm_password_err');
            var name_err = document.getElementById('name_err');
            var email_err = document.getElementById('email_err');
            var nic_err = document.getElementById("nic_err");

            var err_count = 0;

            if (!validator.validateName(name.value)){
                name_err.innerHTML = "Enter a valid name";
                err_count++;
            }
            else{
                name_err.innerHTML = "";
            }

            if (!validator.validateNIC(nic.value)) {
                nic_err.innerHTML = "Enter a valid NIC";
                err_count++;
            } else {
              nic_err.innerHTML = "";
            }

            if (!validator.validateEmail(email.value)){
                email_err.innerHTML = "Enter a valid email";
                err_count++;
            }
            else{
                email_err.innerHTML = "";
            }

            if (err_count){
                e.preventDefault();
            }
            else{
                if (password.value.length >= 6 && password.value == confirm_password.value){
                    password_err.innerHTML = "";
                }
                else{
                    checkPassword();
                    checkConfPassword();
                    e.preventDefault();
                }
            }
        }

    </script>
</body>