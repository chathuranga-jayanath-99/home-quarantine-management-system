<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Log in</h2>

    <form action="<?php echo URLROOT?>/patients/register" method='POST'>
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="password" name="confirm_password">
        </div>

        <div>
            <input type="submit" value="register">
        </div>

        <div>
            <a href="<?php echo URLROOT; ?>/doctors/login">Have an account? Login</a>
        </div>
    </form>

    
</body>
</html>