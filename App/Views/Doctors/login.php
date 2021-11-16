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

    <form action="<?php echo URLROOT?>/patients/login" method='POST'>

        <div>
            <label for="email">Email: </label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password">
        </div>


        <div>
            <input type="submit" value="log-in">
        </div>

        <div>
            <a href="<?php echo URLROOT; ?>/patients/register">Want to create an account?</a>
        </div>
    </form>


</body>
</html>