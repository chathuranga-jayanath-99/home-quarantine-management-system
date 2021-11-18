<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Log In</h2>

    <form action="<?php echo URLROOT?>/doctor/login" method='POST'>

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
            <input type="submit" value="log-in">
        </div>

        <div>
            <a href="<?php echo URLROOT; ?>/doctor/register">Want to create an account?</a>
        </div>
    </form>


</body>
</html>