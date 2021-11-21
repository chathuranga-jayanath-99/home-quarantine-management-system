<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Document</title>
</head>
<body>
    
    <h2>Enter Guardian NIC</h2>

    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
        <div>
            <label for="NIC">Guardian NIC: </label>
            <input type="text" name="NIC" 
                value="<?php echo $data['NIC']?>">
            <span><?php echo $data['nic_err']?></span>
            <input type="hidden" name="id_checked" value="no">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Register - Child Patients</title>
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
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Enter Guardian NIC</h2>
                    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="m2-2 text-muted" for="NIC">Guardian NIC</label>
                            </div>
                            <input class="form-control" type="text" name="NIC" 
                                value="<?php echo $data['NIC']?>">
                            <span><?php echo $data['nic_err']?></span>
                            <input type="hidden" name="id_checked" value="no">
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="btn btn-primary ms-auto" type="submit" value="Submit">
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
>>>>>>> master

    
</body>
</html>