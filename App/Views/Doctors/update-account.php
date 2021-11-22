<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>

<h1>Update Your Account</h1>

<form action="<?php echo URLROOT?>/doctor/update" method="POST">
    <div class="d-flex flex-row align-items-center mb-4">
        <!-- <i class="fas fa-user fa-lg me-3 fa-fw"></i>  -->
        <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>"/>
            
            <span><?php echo $data['name_err']?></span>
        </div>
    </div>

    <div class="d-flex flex-row align-items-center mb-4">
        <!-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> -->
        <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="email">Email Address</label>
            <input class="form-control" type="text" name="email" value="<?php echo $data['email']?>"/>
            <span><?php echo $data['email_err']?></span>
        </div>
    </div>

    <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="moh-area">MOH Area </label>
            <input class="form-control" type="text" name="moh_area" value="<?php echo $data['moh_area']?>">
            <span><?php echo $data['moh_area_err']?></span>
        </div>
    </div>

    <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
            <label class="form-label"  for="contact_no">Contact No </label>
            <input class="form-control" type="text" name="contact_no" value="<?php echo $data['contact_no']?>" required>
            <span><?php echo $data['contact_no_err']?></span>
        </div>
    </div>

    <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="NIC">NIC </label>
            <input class="form-control" type="text" name="NIC" value="<?php echo $data['NIC']?>">
            <span><?php echo $data['NIC_err']?></span>
        </div>
    </div>
    
    <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="slmc_reg_no">SLMS reg no </label>
            <input class="form-control" type="text" name="slmc_reg_no" value="<?php echo $data['slmc_reg_no']?>">
            <span><?php echo $data['slmc_reg_no_err']?></span>
        </div>
    </div>


    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
        <input type="submit" value="Update Account">
    </div>
</form>
</body>
</html>