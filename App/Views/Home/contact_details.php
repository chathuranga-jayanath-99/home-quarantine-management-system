<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Contact Details - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-20 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">
							<h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Emergency Contact Details</h1>
                            <div>
                                <table class="table table-hover table-warning">
                                    <thead>
                                        <tr>
                                            <th class="ps-3" scope="col">Callee</th>
                                            <th scope="col">Contact Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-danger">
                                            <td class="ps-3">Ambulance (Suwaseriya)</td>
                                            <td><a class="link-danger" href="tel:1990"><i class="fa fa-phone me-2" aria-hidden="true"></i>1990</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Notification of Spread</td>
                                            <td><a class="link-success" href="tel:0112860003"><i class="fa fa-phone me-2" aria-hidden="true"></i>011 2 860 003</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Covid Related Public Complain</td>
                                            <td><a class="link-success" href="tel:0114354550"><i class="fa fa-phone me-2" aria-hidden="true"></i>011 4 354 550</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">President Task Force</td>
                                            <td><a class="link-success" href="tel:117"><i class="fa fa-phone me-2" aria-hidden="true"></i>117</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Government Information Center</td>
                                            <td><a class="link-success" href="tel:1919"><i class="fa fa-phone me-2" aria-hidden="true"></i>1919</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Sri Lanka Police</td>
                                            <td><a class="link-success" href="tel:119"><i class="fa fa-phone me-2" aria-hidden="true"></i>119</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Presidential Secretariat</td>
                                            <td><a class="link-success" href="tel:0112354354"><i class="fa fa-phone me-2" aria-hidden="true"></i>011 2 354 354</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Quarantine Unit</td>
                                            <td><a class="link-success" href="tel:0112112075"><i class="fa fa-phone me-2" aria-hidden="true"></i>011 2 112 075</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Ministry of Defence</td>
                                            <td><a class="link-success" href="tel:0112430860"><i class="fa fa-phone me-2" aria-hidden="true"></i>011 2 430 860</a></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">Health Promotion Bureau</td>
                                            <td><a class="link-success" href="tel:0112696606"><i class="fa fa-phone me-2" aria-hidden="true"></i>011 2 696 606</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-5 col-xl-4 d-flex align-items-center order-1 order-lg-2">
                            <div>
                                <div>
                                    <img src="https://img.freepik.com/free-vector/online-doctor-concept-illustration_114360-1831.jpg?size=338&ext=jpg" width=500 class="img-fluid" alt="Sample image">
                                </div>
                                <div class="text-center">
                                    <div>
                                    <?php if (($page !== 'contact-logged')) { ?>
                                        <div>
                                            <a class="btn btn-warning" href="<?php echo URLROOT; ?>">Main Page</a>
                                        </div>
                                    <?php } ?>
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


<!--
    <div class="container mt-3">
        <div class="jumbotron pt-5">
            <h2>Emergency Contact Details</h2>
        </div>
        <p class="h5 pt-3 pb-3"><span style="color:green;">Ambulance (Suwaseriya) :</span><span style="color:red;"> 1990 </span></p>
        <table class="table table-dark">
            <tbody>
            <tr>
                <td>Notification of Spread</td>
                <td>0112 86000 3</td>
            </tr>
            <tr>
                <td>Covid Related Public Complain</td>
                <td>0114 354 550</td>
            </tr>
            <tr>
                <td>President Task Force</td>
                <td>117</td>
            </tr>
            <tr>
                <td>Government Information Center</td>
                <td>1919</td>
            </tr>
            <tr>
                <td>Sri Lanka Police</td>
                <td>119</td>
            </tr>
            <tr>
                <td>Presidential Secretariat</td>
                <td>0112 354 354</td>
            </tr>
            <tr>
                <td>Quarantine Unit</td>
                <td>0112 112 075</td>
            </tr>
            <tr>
                <td>Ministry of Defence</td>
                <td>0112 430 860</td>
            </tr>
            <tr>
                <td>Health Promotion Bureau</td>
                <td>0112 696 606</td>
            </tr>
            </tbody>
        </table>
    <?php //if (($page !== 'contact-logged')) { ?>
        <div>
        <a href="<?php //echo URLROOT; ?>">Main Page</a>
        </div>
    <?php // } ?>
    </div>
    <div class="text-center mt-5 text-muted">
		Copyright &copy; Code Devours 
	</div>
    -->
</body>
</html>