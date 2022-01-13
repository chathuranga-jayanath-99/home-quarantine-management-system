<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
    <?php flash('register_success');?>
    <?php flash('login_fail');?>
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

    <script src="../../static/js/validation-script.js"></script>
    
    <script>
        document.getElementById("form").addEventListener('submit', submitRoutine);

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
    </script>
</body>
</html>