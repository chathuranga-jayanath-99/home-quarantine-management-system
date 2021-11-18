<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Create an Account</h2>

    <form action="<?php echo URLROOT?>/doctor/register" method='POST'>
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" value="<?php echo $data['name']?>">
            <span><?php echo $data['name_err']?></span>
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" value="<?php echo $data['email']?>">
            <span><?php echo $data['email_err']?></span>
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" value="<?php echo $data['password']?>">
            <span><?php echo $data['password_err']?></span>
        </div>
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>">
            <span><?php echo $data['confirm_password_err']?></span>
        </div>

        <div>
            <input type="submit" value="register">
        </div>

        <div>
            <a href="<?php echo URLROOT; ?>/doctor/login">Have an account? Login</a>
        </div>
    </form>

    
</body>
</html>