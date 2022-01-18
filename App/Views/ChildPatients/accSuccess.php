<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - Child Patient - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    include 'phi-navbar.php';
?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Success</h2>
                    <form>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="name" class="form-control" type="text" name="name" value="<?php echo $childObj->getName() ?>" placeholder="Name" readonly>
                                <label for="name"><i class="fa fa-user fa-lg me-3 fa-fw"></i>Name</label>
                            </div>
                        </div>                   
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="NIC" class="form-control" type="text" name="NIC" value="<?php echo $childObj->getNIC() ?>" readonly>
                                <label for="NIC"><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>Guardian NIC</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="email" class="form-control" type="text" name="email" value="<?php echo $childObj->getEmail() ?>" readonly>
                                <label for="email"><i class="fa fa-envelope fa-lg me-3 fa-fw"></i>Email</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="age" class="form-control" type="text" name="age" value="<?php echo $childObj->getAge() ?>" readonly>
                                <label for="age"><i class="fa fa-calendar fa-lg me-3 fa-fw"></i>Age</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="contact_no" class="form-control" type="text" name="contact_no" value="<?php echo $childObj->getContactNo() ?>" readonly>
                                <label for="contact_no"><i class="fa fa-mobile fa-lg me-3 fa-fw"></i>Contact No</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="address" class="form-control" type="text" name="address" value="<?php echo $childObj->getAddress() ?>" readonly>
                                <label for="address"><i class="fa fa-home fa-lg me-3 fa-fw"></i>Address</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <?php 
                            $gender = $childObj->getGender();
                            $Gender;
                            if ($gender === 'male') {
                                $Gender = 'Male';
                            } else if ($gender === 'female') {
                                $Gender = 'Female';
                            } 
                            ?>
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="gender" class="form-control" type="text" name="gender" value="<?php echo $Gender ?>" readonly>
                                <label for="gender"><i class="fa fa-<?php echo $gender ?> fa-lg me-3 fa-fw"></i></label>
                            </div>
                        </div>
                        <?php
                            $state = $childObj->stateToString();
                        ?>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="state" class="form-control" type="text" name="state" value="<?php echo $state ?>" readonly>
                                <label for="state"><i class="fa fa-check fa-lg me-3 fa-fw"></i>State</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="start_date" class="form-control" type="text" name="start_date" value="<?php echo $childObj->getStartQuarantineDate() ?>" readonly>
                                <label for="start_date"><i class="fa fa-calendar-o fa-lg me-3 fa-fw"></i>Quarantine Period Start Date</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="end_date" class="form-control" type="text" name="end_date" value="<?php echo $childObj->getEndQuarantineDate() ?>" readonly>
                                <label for="end_date"><i class="fa fa-calendar fa-lg me-3 fa-fw"></i>Quarantine Period End Date</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input id="phi_range" class="form-control" type="text" name="phi_range" value="<?php echo $childObj->getPHIRange() ?>" readonly>
                                <label for="phi_range"><i class="fa fa-hospital-o fa-lg me-3 fa-fw"></i>PHI Area</label>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <div>
                        <div>
                            <img src="https://img.freepik.com/free-vector/set-doctor-nurse-team-cartoon-hand-drawn-cartoon-art-illustration_56104-753.jpg" width=700 height=700 class="img-fluid" alt="Sample image"> 
                        </div>
                        <div class="text-center">
                        <div>
                            <a href="<?php echo URLROOT; ?>/phi"><button class="btn btn-warning">Home</button></a>
                        </div>
                        </div>
                        </div>
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