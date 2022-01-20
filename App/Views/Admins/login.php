<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <?php flash('register_success');?>
                        <?php flash('login_fail');?>
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
							<h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Admin Login</h1>
                            <form id="log-form" class="mx-1 mx-md-4" action="#" method='POST'>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-floating flex-fill mb-0">
                                        <input onclick="checkEmail()" onblur="checkEmail()" onchange="checkEmail()" class="form-control" id="email" type="text" name="email" placeholder="Email">
                                        <label for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email</label>
                                        <span id="email_err" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-floating flex-fill mb-0">
                                        <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                                        <label for="password"><i class="fa fa-key fa-lg me-3 fa-fw"></i>Password</label>
                                        <span id="password_err" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" class="btn btn-primary" value="Log-in">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <div>
                                <div>
                                    <img src="https://www.asuvictas.com.au/wp-content/uploads/2020/12/work_from_home_covid.png" width=700 height=700 class="img-fluid" alt="Sample image">
                                </div>
                                <div class="text-center pt-3">
                                    <div>
                                        <a href="<?php echo URLROOT; ?>"><button class="btn btn-warning">Main Page</button></a>
                                    </div>
                                </div>
                            </div>
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


<!--
    <?php //flash('register_success');?>
    <?php //flash('login_fail');?>
    <h1>Login</h1>

    <form id="form" action="#" method="POST">
        <div class="form-outline">
            <input type="text" id="email" name="email" placeholder="Enter email:" required>
            <span id="email_err" style="color: red"></span>
        </div>
        <div class="form-outline">
            <input type="password" id="password" name="password" placeholder="Enter password:" required>
            <span id="password_err" style="color: red"></span>
        </div>

        <input type="submit" value="LogIn">
    </form> 
-->

    <script src="../../static/js/validation-script.js"></script>
    
    <script>
        document.getElementById("log-form").addEventListener('submit', submitRoutine);

        function submitRoutine(e){
            // var password = document.getElementById('password');
            var email = document.getElementById("email");

            var email_err = document.getElementById('email_err');

            var err_count = 0;

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

            }
        }

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
    </script>
</body>
</html>