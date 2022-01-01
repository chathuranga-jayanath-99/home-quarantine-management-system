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
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">Active-Conatact Patients</h2>  
                    <?php if (sizeof($contact_patient) > 0) { ?>
                        <div>
                            <h6 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">Please select the account that want to mark as positive</h6>
                        </div>
                    <form action="<?php echo URLROOT?>/adult-patient/active " method="POST">
                        <div>
                        <?php 
                       
                        foreach ($contact_patient as $adultData) {
                                ?>
                                <div>
                                    <input class="form-check-input" type="radio" name="email" value="<?php echo $adultData->email ?>">
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="email"><?php echo $adultData->name ?></label>
                                    </span>
                                </div>
                                <input type="hidden" name="nic" value="<?php echo $nic ?>">
                                <input type="hidden" name="changed" value="true">
                                <?php
                            
                        }


                            
                        
                        ?>
                        </div>
        
                            <div class="d-flex align-items-center pt-3">
                                <input class="btn btn-primary ms-auto" type="submit" value="Make Positive">
                            </div>

                    </form>
                    <?php
                    } else {
                        ?>
                        <div>
                            No contact accounts found
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <h4 class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">Do you want to continue marking positive child patients?</h4>
                    
                    <div class="text-center mt-3">
                        <a href="<?php echo URLROOT.'/child-patient/markpositive' ?>">
                                <button style="width:100px;" class="btn btn-success ">Yes</button>
                        </a>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="<?php echo URLROOT.'/phi' ?>">
                                <button style="width:100px;" class="btn btn-danger ">No</button>
                        </a>
                    </div>
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