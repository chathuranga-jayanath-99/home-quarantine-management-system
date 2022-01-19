<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Adult Patient - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
							<h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Adult-Patient Login</h1>
                            <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/adult-patient/login" method='POST'>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-floating flex-fill mb-0">
                                        <input onclick="checkEmail()" onblur="checkEmail()" onchange="checkEmail()" class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']?>" placeholder="Email">
                                        <label for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email</label>
                                        <span id="email_err" style="color:red"><?php echo $data['email_err']?></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-floating flex-fill mb-0">
                                        <input onclick="checkPassword()" onblur="checkPassword()" onchange="checkPassword()" class="form-control" id="password" type="password" name="password" value="<?php echo $data['password']?>" placeholder="Password">
                                        <label for="password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Password</label>
                                        <span id="password_err" style="color:red"><?php echo $data['password_err']?></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" class="btn btn-primary" value="Log-in">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <div><div>    
                            <img src="https://image.freepik.com/free-vector/people-wearing-medical-mask_52683-35467.jpg" width=700 height=700 class="img-fluid" alt="Sample image" style="border-radius: 50px;"> 
                        </div>
                        <div class="text-center pt-4">
                            <div>
                                <a href="<?php echo URLROOT; ?>"><button class="btn btn-warning">Main Page</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>
        </div>
        </div>
    </div>
    </section>
    <script src="../../static/js/validation-script.js"></script>
    <script>
        document.getElementById("log-form").addEventListener('submit', submitRoutine);

        function checkEmail() {
            var email = document.getElementById("email");
            var email_err = document.getElementById('email_err');
            if (!validator.validateEmail(email.value)) {
                email_err.innerHTML = "Please enter a valid email";
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
            }
        }

        function submitRoutine(e){

            var password = document.getElementById('password');
            var email = document.getElementById("email");

            var password_err = document.getElementById('password_err');
            var email_err = document.getElementById('email_err');

            var err_count = 0;

            if (!validator.validateEmail(email.value)){
                email_err.innerHTML = "Enter a valid email";
                err_count++;
            }
            else{
                email_err.innerHTML = "";
            }

            if (password.value.length == 0) {
                password_err.innerHTML = "Please enter a password";
                err_count++;
            } else if (password.value.length < 6) {
                password_err.innerHTML = "Password must be at least 6 characters";
                err_count++;
            } else {
                password_err.innerHTML = "";
            }

            if (err_count){
                e.preventDefault();
            }

        }

    </script>
</body>
</html>
