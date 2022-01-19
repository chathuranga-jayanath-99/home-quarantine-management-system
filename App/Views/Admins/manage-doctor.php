<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <?php flash('register_doctor');?>
    <h1>Manage Doctor</h1>

    <a href="<?php echo URLROOT;?>/admin/user/register-doctor" class="btn btn-primary">Add Doctor</a>

    <table>
        <tr>
            <td><strong>Full Name</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Actions</strong></td>
        </tr>
        <?php
            if (sizeof($doctors) > 0){
                foreach($doctors as $doctor){
                    ?>

                    <tr>
                        <td><?php echo $doctor->name; ?></td>
                        <td><?php echo $doctor->email; ?></td>
                        <td>
                            <a href="#">View Details</a>
                        </td>
                    </tr>

                    <?php
                }
            }   
            else{
                ?>
                <tr>
                    <td>No Doctors</td>
                </tr>
                <?php
            }     
        ?>
    </table>
</body>
</html>