<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME QURANTINE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    include 'phi-navbar.php';
?>
  <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create an Account</h2>
                  <form action="<?php echo URLROOT?>/PHI/adult-patient/register" method='POST' id="reg-form">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input onclick="checkName()" onblur="checkName()" onchange="checkName()" id="name" class="form-control" type="text" name="name" value="<?php echo $data['name']?>" placeholder="Patient Name" required>
                        <label for="name"><i class="fa fa-user fa-lg me-3 fa-fw"></i>Name</label>
                        <span id="name_err" style="color:red"><?php echo $data['name_err']?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input type="text" name="NIC" value="<?php echo $data['NIC']?>" class="form-control" placeholder="NIC Number" readonly>
                        <label for="NIC"><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>NIC</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input onclick="checkEmail()" onblur="checkEmail()" onchange="checkEmail()" class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']?>" placeholder="Email Address" required >
                        <label for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email Address</label>
                        <span id="email_err" style="color:red"><?php echo $data['email_err']?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input onclick="checkPassword()" onblur="checkPassword()" onchange="checkPassword()" id="password" type="password" name="password" value="<?php echo $data['password']?>" class="form-control" placeholder="Password" required>
                        <label for="password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Password</label>
                        <span id="password_err" style="color:red"><?php echo $data['password_err']?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input onclick="checkConfPassword()" onblur="checkConfPassword()" onchange="checkConfPassword()" id="confirm_password" type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>" class="form-control" placeholder="Confirm password" required>
                        <label for="confirm_password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Confirm Password</label>
                        <span id="confirm_password_err" style="color:red"><?php echo $data['confirm_password_err']?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input class="form-control" id="age" type="text" name="age" value="<?php echo $data['age']?>" placeholder="Age" required>
                        <label for="age"><i class="fa fa-calendar fa-lg me-3 fa-fw"></i>Age</label>
                        <span style="color:red;"><?php echo $data['age_err']?></span>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input class="form-control" id="contact_no" type="text" name="contact_no" value="<?php echo $data['contact_no']?>" placeholder="Contact No" required>
                        <label for="contact_no"><i class="fa fa-mobile fa-lg me-3 fa-fw"></i>Contact No</label>
                        <span style="color:red;"><?php echo $data['contact_no_err']?></span>
                      </div>
                    </div> 
                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline form-floating flex-fill mb-0">
                        <input class="form-control" id="address" type="text" name="address" value="<?php echo $data['address']?>" placeholder="Address" required>
                        <label for="address"><i class="fa fa-home fa-lg me-3 fa-fw"></i>Address</label>
                        <span style="color:red;"><?php echo $data['address_err']?></span>
                      </div>
                    </div>

                    <div>
                      <div>
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                        <i class="fa fa-male fa-lg fa-fw"></i>
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="radio" name="gender" value="female" id="female" required>
                        <i class="fa fa-female fa-lg fa-fw"></i>
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                    </div>

                    <input type="hidden" name="id_checked" value="yes">
                    <input type="hidden" name="new" value="no">

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" class="btn btn-primary " value="Register">
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
            <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
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

            var password_err = document.getElementById('password_err');
            var confirm_password_err = document.getElementById('confirm_password_err');
            var name_err = document.getElementById('name_err');
            var email_err = document.getElementById('email_err');

            var err_count = 0;

            if (!validator.validateName(name.value)){
                name_err.innerHTML = "Enter a valid name";
                err_count++;
            }
            else{
                name_err.innerHTML = ""
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
</html>