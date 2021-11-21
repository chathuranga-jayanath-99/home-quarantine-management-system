<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Child Patients</title>
</head>
<body>
    
    <h2>Create an Account</h2>

    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" 
                value="<?php echo $data['name']?>">
            <span><?php echo $data['name_err']?></span>
        </div>
        <div>
            <label for="NIC">Guardian NIC: </label>
            <input type="text" name="NIC" 
                value="<?php echo $data['NIC']?>" readonly>
            <span><?php echo $data['nic_err']?></span>
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" 
                value="<?php echo $data['email']?>">
            <span><?php echo $data['email_err']?></span>
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" 
                value="<?php echo $data['password']?>">
            <span><?php echo $data['password_err']?></span>
        </div>
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="password" name="confirm_password" 
                value="<?php echo $data['confirm_password']?>">
            <span><?php echo $data['confirm_password_err']?></span>
        </div>
        <input type="hidden" name="id_checked" value="yes">
        <input type="hidden" name="new" value="no">
        <div>
            <input type="submit" value="Register">
        </div>
    </form>

    
</body>
</html>