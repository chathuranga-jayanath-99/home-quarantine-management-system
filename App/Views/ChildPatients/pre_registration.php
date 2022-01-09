<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Child Patient - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">Enter Guardian NIC</h2>
                    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
                        <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <input class="form-control" type="text" name="NIC" 
                                value="<?php echo $data['NIC']?>" placeholder="Guardian NIC" required>
                            <input type="hidden" name="id_checked" value="no">
                            <span style="color: red;"><?php echo $data['nic_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="btn btn-primary ms-auto" type="submit" value="Submit">
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
                <a href="<?php echo URLROOT?>/child-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>