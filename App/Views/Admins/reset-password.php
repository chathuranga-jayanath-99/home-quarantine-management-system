<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <h1>Change Password</h1>

    <form action="<?php echo URLROOT.'/admin/user/reset-password'?>" method="POST">
        <div class="form-group">
            <label for="">Current password: </label>
            <input type="password" name="current_password" class="form-control" required placeholder="Enter current password">
        </div>
        
        <div class="form-group">
            <label for="">New Password:</label>
            <input type="password" name="new_password" class="form-control" required placeholder="Enter new password">
        </div>

        <div class="form-group">
            <label for="">Confirm new password: </label>
            <input type="password" name="confirm_password" class="form-control" required placeholder="Confirm new password">
        </div>
        <input type="hidden" name="admin_id" value="<?php echo $_REQUEST['id']; ?>">
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>