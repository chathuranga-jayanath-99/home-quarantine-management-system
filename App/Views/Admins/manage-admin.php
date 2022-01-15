<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <?php flash('reset_password');?>

    <h1>Manage Admin</h1>

    <a href="<?php echo URLROOT;?>/admin/user/register" class="btn btn-primary">Add Admin</a>

    <table>
        <tr>
            <td><strong>Full Name</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Actions</strong></td>
        </tr>
        <?php
            if (sizeof($admins) > 0){
                foreach($admins as $admin){
                    ?>

                    <tr>
                        <td><?php echo $admin->name; ?></td>
                        <td><?php echo $admin->email; ?></td>
                        <td>
                            <a href="#">Update Admin</a>
                            <a href="<?php echo URLROOT.'/admin/user/reset-password'?>" onclick="resetRoutine(event, <?php echo $admin->id;?>)">Reset Password</a>
                            <!-- <button onclick="resetRoutine">Reset Password</button> -->
                        </td>
                    </tr>

                    <?php
                }
            }   
            else{
                ?>
                <tr>
                    <td>No admins</td>
                </tr>
                <?php
            }     
        ?>
    </table>

    <script>
        function resetRoutine(e, adminId){
            sessionStorage.setItem('reset_admin_id', adminId);
        }
    </script>
</body>
</html>