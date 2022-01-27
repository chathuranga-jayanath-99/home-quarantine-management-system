<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div style="display:none;"><?php echo $err; ?></div>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-20 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">
							<h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-danger">Error 5<div class="spinner-border text-danger" role="status"></div>0!</h1>
                            <h2 class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Internal Server Error!</h2>
                            <h5 class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">We are sorry!</h5>
                            <div class="justify-content-center text-center">
                                <a class="btn btn-warning" href="<?php echo URLROOT; ?>">Back To Home Page</a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-5 col-xl-4 d-flex align-items-center order-1 order-lg-2">
                            <div>
                                <div>
                                    <img src="https://image.freepik.com/free-vector/500-internal-server-error-concept-illustration_114360-5572.jpg" width=400 class="img-fluid" alt="Sample image">
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