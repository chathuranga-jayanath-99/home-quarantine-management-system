<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

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
                            <a href="<?php echo URLROOT.'/admin/user/reset-password?id='.$admin->id;?>">Reset Passowrd</a>
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
</body>
</html>