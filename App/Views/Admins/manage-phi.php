<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
        
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <h1>Manage PHI</h1>

    <a href="#" class="btn btn-primary">Add PHI</a>

    <table>
        <tr>
            <td><strong>Full Name</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Actions</strong></td>
        </tr>
        <?php
            if (sizeof($phis) > 0){
                foreach($phis as $phi){
                    ?>

                    <tr>
                        <td><?php echo $phi->name; ?></td>
                        <td><?php echo $phi->email; ?></td>
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
                    <td>No PHIs</td>
                </tr>
                <?php
            }     
        ?>
    </table>

</body>
</html>