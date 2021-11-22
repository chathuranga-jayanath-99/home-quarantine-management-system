<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Login - Child Patients</title>
</head>
<body>

    <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
							<h1 class="fs-4 card-title fw-bold mb-4">Change State</h1>
                            <form action="<?php echo URLROOT?>/child-patient/active" method='POST'>
                                <div>
                                    <?php $childObj = $args['childObj']; ?>
                                    <div><h6 class="text-left h5 ">Select new state</h6></div><div></div>
                                    <div><h6 class="text-left h6 ">Current state: <?php echo $childObj->state ?> </h6></div>
                                    <div>
                                    <input class="form-check-input" type="radio" name="act" id="positive" value="positive" <?php if($childObj->state === 'positive') {echo 'disabled';}?> >
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="active">Positive</label>
                                    </span>
                                    </div>
                                    <div>
                                    <input class="form-check-input" type="radio" name="act" id="contact" value="contact" <?php if($childObj->state === 'contact') {echo 'disabled';}?> >
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="contact">Contact Person</label>
                                    </span>
                                    </div>
                                    <div>
                                    <input class="form-check-input" type="radio" name="act" id="inactive" value="inactive" <?php if($childObj->state === 'inactive') {echo 'disabled';}?> >
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                    </span>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $childObj->id; ?>">
                                    <input type="hidden" name="nic" value="<?php echo $childObj->guardian_id; ?>">
                                    <div class="d-flex align-items-center">
                                    <input class="btn btn-primary ms-auto" type="submit" value="Change">
                                    </div>
                                </div>
                            </form>
                            </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image"> 
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

	<script src="js/login.js"></script>

</body>
</html>