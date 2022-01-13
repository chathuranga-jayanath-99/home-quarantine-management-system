<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
    <h1>Add New Admin</h1>
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
        
        
    </form>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    
    <!-- <script src="../../static/js/encrypt-script.js"></script> -->
    <script src="../../static/js/validation-script.js"></script>
    <script>
        document.getElementById("form").addEventListener('submit', submitRoutine);

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