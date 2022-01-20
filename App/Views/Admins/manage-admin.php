<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
<?php
        $page = 'admins';
        include_once('navbar.php');
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <?php flash('reset_password');?>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Manage Admins</h1>
                            <div class="row mb-5 p-3">
                                <div class="text-center justify-content-center">
                                    <div class="justify-content-center">
                                        <a href="<?php echo URLROOT;?>/admin/user/register"><button class="btn btn-primary">Add Admin</button></a>
                                    </div>
                                </div>
                                <div class="m-3 mt-5 justify-content-center">
                                    <table class="table table-hover">
                                        <thead><tr>
                                            <th scope="col">#</td>
                                            <th scope="col">Full Name</td>
                                            <th scope="col">Email</td>
                                            <th scope="col">Actions</td>
                                        </tr></thead>
                                        <tbody>
                                    <?php
                                        if (sizeof($admins) > 0) {
                                            $idx = 1;
                                            foreach($admins as $admin){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $idx; ?></th>
                                                    <td><?php echo $admin->name; ?></td>
                                                    <td><?php echo $admin->email; ?></td>
                                                    <td>
                                                        <a class="m-2" href="#">Update Admin</a>
                                                        <a class="m-2" href="<?php echo URLROOT.'/admin/user/reset-password'?>" onclick="resetRoutine(event, <?php echo $admin->id;?>)">Reset Password</a>
                                                        <!-- <button onclick="resetRoutine">Reset Password</button> -->
                                                    </td>
                                                </tr>

                                                <?php
                                                $idx++;
                                            }
                                        }   
                                        else {
                                            ?>
                                            <tr>
                                                <td>No admins</td>
                                            </tr>
                                            <?php
                                        }     
                                    ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
                Copyright &copy; Code Devours
			</div>
        </div>
        </div>
    </div>
    </section>


<!--
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <?php //flash('reset_password');?>

    <h1>Manage Admin</h1>

    <a href="<?php echo URLROOT;?>/admin/user/register" class="btn btn-primary">Add Admin</a>

    <table>
        <tr>
            <td><strong>Full Name</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Actions</strong></td>
        </tr>
        <?php
            //if (sizeof($admins) > 0){
                //foreach($admins as $admin){
                    ?>

                    <tr>
                        <td><?php //echo $admin->name; ?></td>
                        <td><?php //echo $admin->email; ?></td>
                        <td>
                            <a href="#">Update Admin</a>
                            <a href="<?php //echo URLROOT.'/admin/user/reset-password'?>" onclick="resetRoutine(event, <?php //echo $admin->id;?>)">Reset Password</a>
                            <- <button onclick="resetRoutine">Reset Password</button> ->
                        </td>
                    </tr>

                    <?php
                //}
            //}   
            //else{
                ?>
                <tr>
                    <td>No admins</td>
                </tr>
                <?php
            //}     
        ?>
    </table>
-->
    <script>
        function resetRoutine(e, adminId){
            sessionStorage.setItem('reset_admin_id', adminId);
        }
    </script>
</body>
</html>