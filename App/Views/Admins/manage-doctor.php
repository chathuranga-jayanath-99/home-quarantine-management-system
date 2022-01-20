<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
<?php
        $page = 'doctors';
        include_once('navbar.php');
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <?php flash('register_doctor');?>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Manage Doctors</h1>
                            <div class="row mb-5 p-3">
                                <div class="text-center justify-content-center">
                                    <div class="justify-content-center">
                                        <a href="<?php echo URLROOT;?>/admin/user/register-doctor"><button class="btn btn-primary">Add Doctor</button></a>
                                    </div>
                                </div>
                                <div class="m-3 mt-5 justify-content-center">
                                    <table class="table table-hover" style="width:100%">
                                        <thead><tr>
                                            <th scope="col">#</td>
                                            <th scope="col">Full Name</td>
                                            <th scope="col">Email</td>
                                            <th scope="col">Actions</td>
                                        </tr></thead>
                                        <tbody>
                                    <?php
                                        if (sizeof($doctors) > 0) {
                                            $idx = 1;
                                            foreach($doctors as $doctor){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $idx; ?></th>
                                                    <td><?php echo $doctor->name; ?></td>
                                                    <td><?php echo $doctor->email; ?></td>
                                                    <td>
                                                        <a class="m-2" onclick="viewDoctor(<?php echo $doctor->id;?>)" href="#">View</a>
                                                    </td>
                                                </tr>

                                                <?php
                                                $idx++;
                                            }
                                        }   
                                        else {
                                            ?>
                                            <tr>
                                                <td>No doctors</td>
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
    <form action="<?php echo URLROOT.'/admin/user/view-doctor'?>" method="post" id="doctor-view">
        <input type="hidden" name="doctor_id" id="doctor_id">
    </form>
    <script>
        function viewDoctor(doctorID){
            document.getElementById('doctor_id').value = doctorID;
            document.getElementById('doctor-view').submit();
        }
    </script>


<!--
    <div class="navbar">
        <a href="<?php //echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php //echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php //echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php //echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php //echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <?php //flash('register_doctor');?>
    <h1>Manage Doctor</h1>

    <a href="<?php //echo URLROOT;?>/admin/user/register-doctor" class="btn btn-primary">Add Doctor</a>

    <table>
        <tr>
            <td><strong>Full Name</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Actions</strong></td>
        </tr>
        <?php
            //if (sizeof($doctors) > 0){
                //foreach($doctors as $doctor){
                    ?>

                    <tr>
                        <td><?php //echo $doctor->name; ?></td>
                        <td><?php //echo $doctor->email; ?></td>
                        <td>
                            <a href="#">View Details</a>
                        </td>
                    </tr>

                    <?php
                //}
            //}   
            //else{
                ?>
                <tr>
                    <td>No Doctors</td>
                </tr>
                <?php
            //}     
        ?>
    </table>
-->
</body>
</html>