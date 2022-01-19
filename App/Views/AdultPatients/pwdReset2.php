<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppName</title>
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
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">Adult Patient<br />Password Reset</h2>  
                    <div>
                        <h4 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">NIC : <?php echo $adultData[0]->NIC ;?></h4>
                        <h4 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">Patient Name : <?php echo $adultData[0]->name ;?></h4>
                    </div>
                    <?php if (sizeof($adultData) > 0) { ?>
                    <form action="<?php echo URLROOT?>/PHI/adult-patient/password-reset" method="POST">
                        <div>
                            <div>
                                <input class="form-check-input" type="hidden" name="email" value="<?php echo $adultData[0]->email ?>">
                            </div>
                            <input type="hidden" name="nic" value="<?php echo $nic; ?>">
                            <input type="hidden" name="id_checked" value="yes">
                            <input type="hidden" name="entered" value="no">
                            <div class="d-flex align-items-center pt-3">
                                <input class="btn btn-primary ms-auto" type="submit" value="Reset">
                            </div>
                        </div>
                    </form>
                    <?php
                    } else {
                        ?>
                        <div>
                            No accounts found for the given NIC
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <img src="https://image.freepik.com/free-vector/people-wearing-medical-mask_52683-35467.jpg" width=700 height=700 class="img-fluid" alt="Sample image" style="border-radius: 50px;"> 
                </div>
                </div>
            </div>
            </div>
            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>