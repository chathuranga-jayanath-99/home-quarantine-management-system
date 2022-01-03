<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>HOME QURANTINE</title>
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
                                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">This NIC Already Have an Acoount</h2>  
                                <div>
                                        <h4 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">NIC : <?php echo $adultData[0]->NIC ;?></h4>
                                        <h4 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">Patient Name : <?php echo $adultData[0]->name ;?></h4>
                                    </div>
                                    <form action="<?php echo URLROOT?>/adult-patient/active" method="POST">
                                        <div>
                                        
                                        </div>
                                            <input type="hidden" name="nic" value="<?php echo $nic ?>">
                                        <div class="d-flex align-items-center">
                                            <input class="btn btn-primary ms-auto" type="submit" value="Activate">
                                        </div>
                                    </form>
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