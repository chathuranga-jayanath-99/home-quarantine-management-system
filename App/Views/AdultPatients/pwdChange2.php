<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppName</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php 
    $page = 'pwd_change';
    $subPage = '';
    include_once 'navbar.php'; 
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
							<h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Password Change</h1>
                            <form id="pwd-form" class="mx-1 mx-md-4" action="<?php echo URLROOT?>/adult-patient/password-change" method='POST'>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline form-floating flex-fill mb-0">
                                        <input id="email" class="form-control" type="email" name="email" value="<?php echo $_SESSION['adult_email']; ?>" placeholder="New password" disabled>
                                        <label for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline form-floating flex-fill mb-0">
                                        <input onclick="checkPassword()" onblur="checkPassword()" onchange="checkPassword()" id="password" class="form-control" type="password" name="password" value="<?php echo $data['password']?>" placeholder="New password" required>
                                        <label for="password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>New Password</label>
                                        <span id="password_err" style="color:red"><?php echo $data['password_err']?></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline form-floating flex-fill mb-0">
                                        <input onclick="checkConfPassword()" onblur="checkConfPassword()" onchange="checkConfPassword()" id="confirm_password" class="form-control" type="password" name="conf_password" value="<?php echo $data['conf_password']?>" placeholder="Confirm password" required>
                                        <label for="confirm_password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Confirm Password</label>
                                        <span id="confirm_password_err" style="color:red"><?php echo $data['conf_password_err']?></span>
                                    </div>
                                </div>
                                <input type="hidden" name="entered" value="yes">
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" class="btn btn-primary" value="Change">
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
        document.getElementById("pwd-form").addEventListener('submit', submitRoutine);

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
            var password_err = document.getElementById('password_err');
            var confirm_password_err = document.getElementById('confirm_password_err');
            if (password.value.length >= 6 && password.value == confirm_password.value){
                password_err.innerHTML = "";
            }
            else {
                checkPassword();
                checkConfPassword();
                e.preventDefault();
            }
        }

    </script>
</body>
</html>
