<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppName</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
							<h1 class="fs-4 card-title fw-bold mb-4">Change State</h1>
                            <form action="<?php echo URLROOT?>/child-patient/active" method='POST'>
                                <div>
                                    <?php $childObj = $args['childObj']; ?>
                                    <div class="pb-2"><h6 class="text-left h5 ">Select new state</h6></div><div></div>
                                    <?php
                                        $state = $childObj->state;
                                        if ($state === 'positive') {
                                            $state = 'Positive';
                                        } else if ($state === 'contact') {
                                            $state = 'Contact Person';
                                        } else if ($state === 'inactive') {
                                            $state = 'Inactive';
                                        }
                                    ?>
                                    <div class="pb-3"><h6 class="text-left h6 ">Current state: <?php echo $state ?> </h6></div>
                                    <div class="pb-2">
                                    <input class="form-check-input" type="radio" name="act" id="positive" value="positive" <?php if($childObj->state === 'positive') {echo 'disabled';}?> >
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="active">Positive</label>
                                    </span>
                                    </div>
                                    <div class="pb-2">
                                    <input class="form-check-input" type="radio" name="act" id="contact" value="contact" <?php if($childObj->state === 'contact') {echo 'disabled';}?> >
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="contact">Contact Person</label>
                                    </span>
                                    </div>
                                    <div class="pb-2">
                                    <input class="form-check-input" type="radio" name="act" id="inactive" value="inactive" <?php if($childObj->state === 'inactive') {echo 'disabled';}?> >
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                    </span>
                                    </div class="pb-2">
                                    <input type="hidden" name="email" value="<?php echo $childObj->email; ?>">
                                    <input type="hidden" name="nic" value="<?php echo $childObj->guardian_id; ?>">
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input class="btn btn-primary ms-auto" type="submit" value="Change">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="https://img.freepik.com/free-vector/set-doctor-nurse-team-cartoon-hand-drawn-cartoon-art-illustration_56104-753.jpg" width=700 height=700 class="img-fluid" alt="Sample image"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
				Copyright &copy; Code Devours 
			</div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>