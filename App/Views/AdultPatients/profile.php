<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home Isolation System</title>
</head>
<body>
    <?php
    $page = 'profile';
    $subPage = '';
    include_once 'navbar.php';
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php if(ucfirst($adultData->getGender()) === 'Male') { ?>
                            <img class="rounded-circle mt-5" width="100px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <?php } elseif(ucfirst($adultData->getGender()) === 'Female') { ?>
                            <img class="rounded-circle mt-5" width="100px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqTjHOCWWdu_PhEoiAWJeEMZ2lecPS8WksQw&usqp=CAU">
                            <?php }  ?>
                            <span class="font-weight-bold"><?php echo $adultData->getName(); ?></span>
                            <span class="text-black-50"><?php echo $adultData->getEmail(); ?></span>
                            <span><div class="mt-5 text-center"><a href="<?php echo URLROOT?>/adult-patient/edit-profile" class="btn btn-primary">Edit Profile</a></div></span>
                            <span><div class="mt-3 text-center"><a href="<?php echo URLROOT?>/adult-patient/password-change" class="btn btn-warning">Change Password</a></div></span>
                        </div>
                    </div>
                    <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Name</label>
                        <p class="text-primary"><?php echo $adultData->getName(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <p class="text-primary"><?php echo $adultData->getEmail(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">NIC</label>
                        <p class="text-primary"><?php echo $adultData->getNIC(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Gender</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->getGender()); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <p class="text-primary"><?php echo $adultData->getAge(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Residential Address</label>
                        <p class="text-primary"><?php echo $adultData->getAddress(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Contact Number</label>
                        <p class="text-primary"><?php echo $adultData->getContactNo(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">PHI Range</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->getPhiRange()); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">State</label>
                        <p class="text-primary"><?php echo $adultData->stateToString(); ?></p>
                    </div>
                    
                </div>
                
            </div>
        </div>
                </div>
                </div>
                </div>
                <div class="text-center mt-5 text-muted pt-auto">
                    <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
                </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>