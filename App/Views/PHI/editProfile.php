<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - PHI - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    $page = 'profile-edit';
    $subPage = '';
    include_once 'navbar.php';
    ?>

    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Profile</h2>
                    <form action="<?php echo URLROOT?>/PHI/edit-profile" method='POST'>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>" placeholder="Name" required>
                                <span style="color:red;"><?php echo $data['name_err']?></span>
                            </div>
                        </div> 
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="email" value="<?php echo $data['email']?>" placeholder="Email" required>
                                <span style="color:red;"><?php echo $data['email_err']?></span>
                            </div>
                        </div>                  
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="NIC" value="<?php echo $data['NIC']?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="MOH Area" value="<?php echo $data['MOH_Area']?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="PHI Range" value="<?php echo $data['PHI_Range']?>" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="contact_no" value="<?php echo $data['contact_no']?>" placeholder="Contact Number" required>
                                <span style="color:red;"><?php echo $data['contact_no_err']?></span>
                            </div>
                        </div> 
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </form>
                    </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://image.freepik.com/free-vector/system-software-update-data-update-synchronize-with-progress-bar-screen-vector-stock-illustration_100456-5608.jpg" width=700 height=700 class="img-fluid" alt="Sample image" style="border-radius: 25px;"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/child-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>