<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Admin - Home Isolation System</title>
</head>

<body>
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHI">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <h1>Register a doctor</h1>

    <form action="<?php echo URLROOT;?>/admin/user/register-doctor" method="POST">
        <div class="mb-3">
            <label class="form-label" for="">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter name">
            <span style="color: red"><?php echo $data['name_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Email</label>
            <input class="form-control" type="text" name="email" placeholder="Enter email">
            <span style="color: red"><?php echo $data['email_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter password">
            <span style="color: red"><?php echo $data['password_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Confirm Password</label>
            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm password">
            <span style="color: red"><?php echo $data['confirm_password_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">MOH Area</label>
            <input class="form-control" type="text" name="moh_area" placeholder="Enter MOH area">
            <span style="color: red"><?php echo $data['moh_area_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">NIC</label>
            <input class="form-control" type="text" name="NIC" placeholder="Enter NIC">
            <span style="color: red"><?php echo $data['NIC_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">SLMC Reg No</label>
            <input class="form-control" type="text" name="slmc_reg_no" placeholder="Enter SLMC Reg No">
            <span style="color: red"><?php echo $data['slmc_reg_no_err']?></span>
        </div>

        <div class="form-outline flex-fill mb-0">
            <label class="form-label" for="gender">Gender</label>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">

            <div class="d-flex justify-content-around">

                <div class="p-1">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <i class="fa fa-male fa-lg fa-fw"></i>
                    <label class="form-check-label" for="Male">Male</label>
                </div>

                <div class="p-1">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <i class="fa fa-female fa-lg fa-fw"></i>
                    <label class="form-check-label" for="Female">Female</label>
                </div>

            </div>
            
        </div>


        <div class="mb-3">
            <label class="form-label" for="">Birthday</label>
            <input class="form-control" type="date" name="birthday" placeholder="Enter Birthday">
            <span style="color: red"><?php echo $data['birthday_err']?></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Contact No</label>
            <input class="form-control" type="text" name="contact_no" placeholder="Enter Contact No">
            <span style="color: red"><?php echo $data['contact_no_err']?></span>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Register">
    </form>
</body>
</html>