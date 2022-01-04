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
    <?php include_once 'navbar.php'; ?>
    <section class="vh-auto" style="background-color: #eee;">
        <div class="container h-100 pt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php if(ucfirst($adultData->gender) === 'Male') { ?>
                            <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            <?php } elseif(ucfirst($adultData->gender) === 'Female') { ?>
                            <img class="rounded-circle mt-5" width="150px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqTjHOCWWdu_PhEoiAWJeEMZ2lecPS8WksQw&usqp=CAU">
                            <?php }  ?>
                            <span class="font-weight-bold"><?php echo $_SESSION['adult_name']; ?></span>
                            <span class="text-black-50"><?php echo $_SESSION['adult_email']; ?></span>
                            <span><div class="mt-5 text-center"><a href="https://www.google.com/" class="btn btn-primary">Edit Profile</a></div></span>
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
                        <p class="text-primary"><?php echo $adultData->name ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <p class="text-primary"><?php echo $adultData->email ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">NIC</label>
                        <p class="text-primary"><?php echo $adultData->NIC ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Gender</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->gender) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <p class="text-primary"><?php echo $adultData->age ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Residential Address</label>
                        <p class="text-primary"><?php echo $adultData->address ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Contact Number</label>
                        <p class="text-primary"><?php echo $adultData->contact_no ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">PHI Name</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->phi_id) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">PHI Range</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->phi_range) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Doctor Name</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->doctor_id) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">State</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->state) ;?></p>
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
    <!-- <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?php echo $_SESSION['adult_name']; ?></span>
                <span class="text-black-50"><?php echo $_SESSION['adult_email']; ?></span>
                <span><div class="mt-5 text-center"><a href="https://www.google.com/" class="btn btn-primary">Edit Profile</a></div></span>
                <!-- <span> <div class="mt-5 text-center"><button class="btn btn-primary profile-button" formaction="https://www.google.com/" type="button">Edit Profile</button></div></span> -->
           <!-- </div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Name</label>
                        <p class="text-primary"><?php echo $adultData->name ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email Address</label>
                        <p class="text-primary"><?php echo $adultData->email ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">NIC</label>
                        <p class="text-primary"><?php echo $adultData->NIC ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Gender</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->gender) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <p class="text-primary"><?php echo $adultData->age ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Residential Address</label>
                        <p class="text-primary"><?php echo $adultData->address ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Contact Number</label>
                        <p class="text-primary"><?php echo $adultData->contact_no ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">PHI Name</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->phi_id) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">PHI Range</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->phi_range) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Doctor Name</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->doctor_id) ;?></p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">State</label>
                        <p class="text-primary"><?php echo ucfirst($adultData->state) ;?></p>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
</div>
</div>
</div> -->
</body>
</html>