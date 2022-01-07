<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>
    <h1>Add New Admin</h1>
    <form id="form" action="#" method="POST" class="mx-1 mx-md-4">
        <div class="form-outline">
            <input type="text" id="name" name="name" placeholder="Enter Name" required>
            <span id="name_err" style="color: red"></span>
        </div>
        <div class="form-outline">
            <input type="text" id="email" name="email" placeholder="Enter email" required>
            <span id="email_err" style="color: red"></span>
        </div>
        <div class="form-outline">
            <input type="password" id="pass" name="password" placeholder="password" required>
        </div>
        <div class="form-outline">
            <input type="password" id="confirm_pass" name="confirm_password" placeholder="confirm password" required>
            <span id="pass_err" style="color: red"></span>
        </div>
        
        <div class="form-outline">
            <input type="submit" name="Submit" id="submit">
        </div>
        
        
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="../../static/js/encrypt-script.js"></script>
    <script src="../../static/js/validation-script.js"></script>
    <script>
        document.getElementById("form").addEventListener('submit', submitRoutine);

        function submitRoutine(e){

            var pass = document.getElementById('pass');
            var confirm_pass = document.getElementById('confirm_pass');
            var name = document.getElementById("name");

            var pass_err = document.getElementById('pass_err');
            var name_err = document.getElementById('name_err');

            var err_count = 0;

            if (!validator.validateName(name.value)){
                name_err.innerHTML = "Enter a valid name";
                err_count++;
            }
            else{
                name_err.innerHTML = ""
            }
            
            if (err_count){
                e.preventDefault();
            }
            else{
                if (pass.value == confirm_pass.value){
                    pass.value = crypt.encrypt(pass.value);
                    confirm_pass.value = pass.value;
                    pass_err.innerHTML = "";
                }
                else{
                    pass_err.innerHTML = "Passwords not match";
                    e.preventDefault();
                }
            }
        }
    </script>
</body>
</html>