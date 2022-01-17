<?php include(APPROOT.'/App/Views/Includes/header.php'); ?><?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/doctor">Home</a>
        <a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>
    </div>

    <h1>Change Password</h1>

    <form action="<?php echo URLROOT.'/doctor/reset-password'?>" method="POST">
        <div class="form-group">
            <label for="">Current password: </label>
            <input type="password" name="current_password" class="form-control" required placeholder="Enter current password">            
            <span id="current_password_err" name="current_password_err" value="" style="color: red"><?php echo $data['current_password_err']?></span>
        </div>
        
        <div class="form-group">
            <label for="">New Password:</label>
            <input type="password" name="new_password" class="form-control" required placeholder="Enter new password">
            <span id="new_password_err" name="new_password_err" value="" style="color: red"><?php echo $data['new_password_err']?></span>
        </div>

        <div class="form-group">
            <label for="">Confirm new password: </label>
            <input type="password" name="confirm_password" class="form-control" required placeholder="Confirm new password">            
            <span id="confirm_password_err" name="confirm_password_err" value="" style="color: red"><?php echo $data['confirm_password_err']?></span>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Change Password">
    </form>
    
</body>
</html>