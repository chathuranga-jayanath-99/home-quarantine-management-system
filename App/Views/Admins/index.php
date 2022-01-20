<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    <?php
        $page = 'home';
        include_once('navbar.php');
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome!</h1>
                            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5 p-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Count</th>
                                            <th scope="col">Manage</th>
                                            <th scope="col">Add New</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <th scope="row">Admins</td>
                                            <td><?php echo $data['adminCount']?></td>
                                            <td><a class="btn" href="<?php echo URLROOT;?>/admin/user/manage-admin">Manage Admins</a></td>
                                            <td><a href="<?php echo URLROOT;?>/admin/user/register" class="btn">Add Admin</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <th scope="row">Doctors</td>
                                            <td><?php echo $data['doctorCount']?></td>
                                            <td><a class="btn" href="<?php echo URLROOT;?>/admin/user/manage-doctor">Manage Doctors</a></td>
                                            <td><a href="<?php echo URLROOT;?>/admin/user/register-doctor" class="btn">Add Doctor</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <th scope="row">PHIs</td>
                                            <td><?php echo $data['phiCount']?></td>
                                            <td><a class="btn" href="<?php echo URLROOT;?>/admin/user/manage-PHI">Manage PHIs</a></td>
                                            <td><a href="<?php echo URLROOT; ?>/admin/user/register-PHI" class="btn">Add PHI</a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <h1>Welcome Admin <?php echo $_SESSION['admin_name']; ?></h1>

    <p>Admin count: <span><?php echo $data['adminCount']?></span></p>
    <p>Doctor count: <span><?php echo $data['doctorCount']?></span></p>
    <p>PHI count: <span><?php echo $data['phiCount']?></span></p>
-->

</body>
</html>