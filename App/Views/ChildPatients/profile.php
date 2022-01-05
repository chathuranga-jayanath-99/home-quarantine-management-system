<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    $page = 'profile';
    $subPage = '';
    include_once 'navbar.php';
    ?>
    <section class="vh-auto" style="background-color: #eee;">
        <div class="container h-100 pt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php if(ucfirst($childData->getGender()) === 'Male') { ?>
                            <img class="rounded-circle mt-5" width="100px" src="https://image.flaticon.com/icons/png/512/146/146007.png">
                            <?php } elseif(ucfirst($childData->getGender()) === 'Female') { ?>
                            <img class="rounded-circle mt-5" width="100px" src="https://cdn-icons-png.flaticon.com/512/146/146005.png">
                            <?php }  ?>
                            <span class="font-weight-bold"><?php echo $childData->getName(); ?></span>
                            <span class="text-black-50"><?php echo $childData->getEmail(); ?></span>
                            <span><div class="mt-5 text-center"><a href="<?php echo URLROOT?>/child-patient/edit-profile" class="btn btn-primary">Edit Profile</a></div></span>
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
                        <p class="text-primary"><?php echo $childData->getName(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <p class="text-primary"><?php echo $childData->getEmail(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Guardian NIC</label>
                        <p class="text-primary"><?php echo $childData->getNIC(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Gender</label>
                        <p class="text-primary"><?php echo ucfirst($childData->getGender()); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <p class="text-primary"><?php echo $childData->getAge(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Residential Address</label>
                        <p class="text-primary"><?php echo $childData->getAddress(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Contact Number</label>
                        <p class="text-primary"><?php echo $childData->getContactNo(); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">PHI Range</label>
                        <p class="text-primary"><?php echo ucfirst($childData->getPhiRange()); ?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">State</label>
                        <p class="text-primary"><?php echo $childData->stateToString(); ?></p>
                    </div>
                    
                </div>
                
            </div>
        </div>
                </div>
                </div>
                </div>
                <div class="text-center mt-5 text-muted pt-auto">
				    Copyright &copy; Code Devours 
			    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>