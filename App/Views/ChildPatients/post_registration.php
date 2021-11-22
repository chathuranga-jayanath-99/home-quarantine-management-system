<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register - Child Patients</title>
</head>
<body>

    <section class="vh-100" style="background-color: #eee;">    
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create an Account</h2>
                    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>" placeholder="Name" required>
                                <span style="color:red;"><?php echo $data['name_err']?></span>
                            </div>
                        </div>                   
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="NIC" value="<?php echo $data['NIC']?>" readonly>
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
                            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="password" name="password" value="<?php echo $data['password']?>" placeholder="Password" required>
                                <span style="color:red;"><?php echo $data['password_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="password" name="confirm_password" value="<?php echo $data['confirm_password']?>" placeholder="Confirm Password" required>
                                <span style="color:red;"><?php echo $data['confirm_password_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-mobile fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="contact_no" value="<?php echo $data['contact_no']?>" placeholder="Contact No" required>
                                <span style="color:red;"><?php echo $data['contact_no_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-home fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="address" value="<?php echo $data['address']?>" placeholder="Address" required>
                                <span style="color:red;"><?php echo $data['address_err']?></span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="radio" name="gender" id="male" value="male" checked>
                                <i class="fa fa-male fa-lg fa-fw"></i>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div>
                                <input type="radio" name="gender" value="female" id="female">
                                <i class="fa fa-female fa-lg fa-fw"></i>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <input type="hidden" name="id_checked" value="yes">
                        <input type="hidden" name="new" value="no">
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input class="btn btn-primary" type="submit" value="Register">
                        </div>
                    </form>
                    </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://img.freepik.com/free-vector/set-doctor-nurse-team-cartoon-hand-drawn-cartoon-art-illustration_56104-753.jpg" width=700 height=700 class="img-fluid" alt="Sample image"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>