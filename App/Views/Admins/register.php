<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container-fluid justify-content-left">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin/user">
            <img src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png" alt="" height="24" class="d-inline-block align-text-top">
            <?php echo $_SESSION['admin_name']; ?>
        </a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-admin" class="navbar-brand ms-5"><i class="fa fa-arrow-circle-left fa-lg me-3 fa-fw"></i></a>
        <ol class="breadcrumb navbar-nav me-auto mb-2 mb-lg-0">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
        </ol>
    </div>
</nav>
<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Admin</h2>
                    <form action="<?php echo URLROOT?>/admin/user/register" method='POST' id="reg-form">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input onclick="checkName()" onblur="checkName()" onchange="checkName()" id="name" class="form-control" type="text" name="name" value="<?php echo $data['name']?>" placeholder="Name" required>
                                <label for="name"><i class="fa fa-user fa-lg me-3 fa-fw"></i>Name</label>
                                <span id="name_err" style="color:red;"><?php //echo $data['name_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input onclick="checkEmail()" onblur="checkEmail()" onchange="checkEmail()" class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']?>" placeholder="Email" required>
                                <label for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email</label>
                                <span id="email_err" style="color:red;"><?php //echo $data['email_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input onclick="checkPassword()" onblur="checkPassword()" onchange="checkPassword()" id="password" class="form-control" id="password" type="password" name="password" value="<?php echo $data['password']?>" placeholder="Password" required>
                                <label for="password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Password</label>
                                <span id="password_err" style="color:red;"><?php //echo $data['password_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input onclick="checkConfPassword()" onblur="checkConfPassword()" onchange="checkConfPassword()" id="confirm_password" class="form-control" type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>" placeholder="Confirm Password" required>
                                <label for="confirm_password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Confirm Password</label>
                                <span id="confirm_password_err" style="color:red;"><?php //echo $data['confirm_password_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input class="btn btn-primary" type="submit" value="Register">
                        </div>
                    </form>
                    </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://www.asuvictas.com.au/wp-content/uploads/2020/12/work_from_home_covid.png" width=700 height=700 class="img-fluid" alt="Sample image"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/child-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>
        </div>
        </div>
    </div>
    </section>


    <!-- <h1>Add New Admin</h1>
    <form id="form" action="<?php echo URLROOT.'/admin/user/register';?>" method="POST" class="mx-1 mx-md-4">
        <div class="form-outline">
            <input type="text" id="name" name="name" placeholder="Enter Name" required>
            <span id="name_err" style="color: red"></span>
        </div>
        <div class="form-outline">
            <input type="text" id="email" name="email" placeholder="Enter email" required>
            <span id="email_err" style="color: red"></span>
        </div>
        <div class="form-outline">
            <input type="password" id="password" name="password" placeholder="password" required>
            <span id="password_err" style="color: red"></span>
        </div>
        <div class="form-outline">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password" required>
            <span id="confirm_password_err" style="color: red"></span>
        </div>
        
        <div class="form-outline">
            <input type="submit" name="Submit" id="submit">
        </div>
        
        
    </form> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    
    <!-- <script src="../../static/js/encrypt-script.js"></script> -->
    <script src="../../static/js/validation-script.js"></script>
    <script>
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

        document.getElementById("reg-form").addEventListener('submit', submitRoutine);

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
                if (password.value == confirm_password.value){

                    password_err.innerHTML = "";
                }
                else{
                    password_err.innerHTML = "Passwords do not match";
                    e.preventDefault();
                }
            }
        }

    </script>
</body>
</html>