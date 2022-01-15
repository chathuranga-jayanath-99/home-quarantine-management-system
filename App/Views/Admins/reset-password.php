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
            <span id="password_err" name="password_err" value="" style="color: red"><?php echo $data['password_err']?></span>
        </div>

        <div class="form-group">
            <label for="">Confirm new password: </label>
            <input type="password" name="confirm_password" class="form-control" required placeholder="Confirm new password">
        </div>
        <input type="hidden" id="reset_admin_id" name="reset_admin_id">

        <input type="submit" class="btn btn-primary" value="Change Password" onclick="submitRoutine(event)">
    </form>

    <script>
        function submitRoutine(e){
            var reset_admin_id = document.getElementById('reset_admin_id');
            reset_admin_id.value = sessionStorage.getItem('reset_admin_id');

            sessionStorage.removeItem('reset_admin_id');
        }

    </script>

</body>
</html>