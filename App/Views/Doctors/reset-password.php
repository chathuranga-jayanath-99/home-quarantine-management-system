<?php include(APPROOT.'/App/Views/Includes/header.php'); ?><?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<title>Home Isolation System</title>
</head>

<body>
    
    <?php 
    $page = 'update';
    $subPage = 'profile';
    include_once 'includes/navbar.php'; 
    ?>

    <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">Password Change</h2>

    <form action="<?php echo URLROOT.'/doctor/reset-password'?>" method="POST">

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
            
            <div class="form-outline flex-fill mb-0">
                <label for="" class="form-label" >Current password: </label>

                <input class="form-control" type="password" name="current_password" value="<?php echo $data['current_password']?>" required placeholder="Enter current password">
                <span name="current_password_err"  style="color:red;"><?php echo $data['current_password_err']?></span>

            </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
            
            <div class="form-outline flex-fill mb-0">
                <label for="" class="form-label" >New password: </label>

                <input class="form-control" type="password" name="new_password" value="<?php echo $data['new_password']?>" required placeholder="Enter new password">
                <span name="new_password_err" style="color:red;"><?php echo $data['new_password_err']?></span>

            </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
            
            <div class="form-outline flex-fill mb-0">
                <label for="" class="form-label" >Confirm new password: </label>

                <input class="form-control" type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>" required placeholder="Confirm new password">
                <span name="confirm_password_err" style="color:red;"><?php echo $data['confirm_password_err']?></span>

            </div>
        </div>
        
        <div class="d-flex align-items-center">
            <input class="btn btn-primary ms-auto" type="submit" value="Change Password">
        </div>

    </form>
    </div>

        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
            <img src="https://image.freepik.com/free-vector/people-wearing-medical-mask_52683-35467.jpg" width=700 height=700 class="img-fluid" alt="Sample image" style="border-radius: 50px;"> 
        </div>

                </div>
            </div>
        </div>

        <div class="text-center mt-5 text-muted">
            <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
        </div>

    </div>
    </div>
</div>

</section>

</body>
</html>