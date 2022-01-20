<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
    <?php
    $page = 'check-patients';
    $subPage = '';
    include_once 'includes/navbar.php';
    ?>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
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
                                    <td><?php echo $patient['name']?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $patient['email']?></td>
                                </tr>
                                <tr>
                                    <th>PHI range</th>
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
                                    <td>
                                        <?php 
                                            if ($patient['type'] === 'adult'){
                                                echo $patient['NIC'];
                                            }
                                            else if ($patient['type'] === 'child'){
                                                echo $patient['guardian_id'];
                                            }  
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td><?php echo ucfirst($patient['state']).' Person'; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact No</th>
                                    <td><?php echo $patient['contact_no']?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?php echo ucfirst($patient['gender'])?></td>
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