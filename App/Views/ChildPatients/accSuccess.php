<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>

    <section class="vh-100" style="background-color: #eee;">    
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Success</h2>
                    <?php
                        $childObj = $args['childObj'];
                    ?>
                    <form>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="name" value="<?php echo $childObj->name ?>" placeholder="Name" readonly>
                            </div>
                        </div>                   
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="NIC" value="<?php echo $childObj->guardian_id ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="email" value="<?php echo $childObj->email ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-mobile fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="contact_no" value="<?php echo $childObj->contact_no ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-home fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="address" value="<?php echo $childObj->address ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <?php 
                            $gender = $childObj->gender;
                            $Gender;
                            if ($gender === 'male') {
                                $Gender = 'Male';
                            } else if ($gender === 'female') {
                                $Gender = 'Female';
                            } 
                            ?>
                            <i class="fa fa-<?php echo $gender ?> fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="gender" value="<?php echo $Gender ?>" readonly>
                            </div>
                        </div>
                        <?php
                            $state = $childObj->state;
                            if ($state === 'active') {
                                $state = 'Active';
                            } else if ($state === 'contact') {
                                $state = 'Contact Person';
                            } else if ($state === 'inactive') {
                                $state = 'Inactive';
                            }
                        ?>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-check fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="state" value="<?php echo $state ?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="phi_range" value="<?php echo $childObj->phi_range ?>" readonly>
                            </div>
                        </div>
                    </form>
                    </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://img.freepik.com/free-vector/set-doctor-nurse-team-cartoon-hand-drawn-cartoon-art-illustration_56104-753.jpg" width=700 height=700 class="img-fluid" alt="Sample image"> 
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
</body>
</html>