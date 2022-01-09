<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
    <h1>Login</h1>

    <form id="form" action="#" method="POST">
        <input type="text" name="email" placeholder="Enter email:">
        <input type="password" id="password" name="password" placeholder="Enter password:">

        <input type="submit" value="LogIn">
    </form> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="../../static/js/encrypt-script.js"></script>
    <script src="../../static/js/validation-script.js"></script>
    
    <script>
        document.getElementById("form").addEventListener('submit', submitRoutine);

        function submitRoutine(e){
            var password = document.getElementById('password');

            password.value = crypt.encrypt(password.value);

        }
    </script>
</body>
</html>