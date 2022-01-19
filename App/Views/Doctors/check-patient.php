<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $page = 'check-patients';
    $subPage = '';
    include_once 'includes/navbar.php';
    ?>

<section class="vh-auto py-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Patient Details</h1>
                            <table class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $patient['email']?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $patient['phi_range']?></td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td><?php echo $patient['age']?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo $patient['address']?></td>
                                </tr>
                                <tr>
                                    <th><?php
                                        if ($patient['type'] === 'adult'){
                                            echo 'NIC';
                                        }
                                        else if ($patient['type'] === 'child'){
                                            echo 'Guardian NIC';
                                        }                
                                    ?></th>
                                    <td><?php echo $patient['NIC']?></td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td><?php echo $patient['state']?></td>
                                </tr>
                                <tr>
                                    <th>Contact No</th>
                                    <td><?php echo $patient['contact_no']?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?php echo $patient['gender']?></td>
                                </tr>
                                <tr>
                                    <th>End Quarantine Date</th>
                                    <td><?php echo $patient['end_quarantine_date']?></td>
                                </tr>

                            </table>


                        </div>
                    </div>  
                </div>
            </div>

            <div class="text-center mt-5 text-muted">
            <a href="<?php echo URLROOT?>/doctor/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
            </div>

        </div>
    </div>
</div>


</section>

</body>
</html>