<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
<?php
        $page = 'phis';
        include_once('navbar.php');
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <?php flash('register_phi');?>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Manage PHIs</h1>
                            <div class="row mb-5 p-3">
                                <div class="text-center justify-content-center">
                                    <div class="justify-content-center">
                                        <a href="<?php echo URLROOT;?>/admin/user/register-phi"><button class="btn btn-primary">Add PHI</button></a>
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
                                        if (sizeof($phis) > 0) {
                                            $idx = 1;
                                            foreach($phis as $phi){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $idx; ?></th>
                                                    <td><?php echo $phi->name; ?></td>
                                                    <td><?php echo $phi->email; ?></td>
                                                    <td>
                                                        <a class="m-2" href="#">View</a>
                                                    </td>
                                                </tr>

                                                <?php
                                                $idx++;
                                            }
                                        }   
                                        else {
                                            ?>
                                            <tr>
                                                <td>No phis</td>
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
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-phi">phi</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <?php flash('register_PHI');?>
    <h1>Manage PHI</h1>

    <a href="<?php echo URLROOT; ?>/admin/user/register-PHI" class="btn btn-primary">Add PHI</a>

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
-->
</body>
</html>