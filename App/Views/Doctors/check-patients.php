<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<style>
    a:link {
        text-decoration: none;
    }
</style>

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

                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Your Patients</h1>
        
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Actions</th>
                                </tr>

                                <?php
                                    if (sizeof($typed_patients['adult']) > 0 || sizeof($typed_patients['child']) > 0){
                                        $sn = 1;
                                        foreach ($typed_patients as $type => $patients):
                                            
                                            foreach($patients as $patient):
                                                ?>
                                                <tr>
                                                    <th><?php echo $sn++; ?></th>
                                                    <td><?php echo $patient->name; ?></td>
                                                    <td><?php echo $patient->age; ?></td>
                                                    <td><a href="<?php echo URLROOT; ?>/doctor/check-patient?id=<?php echo $patient->id?>&type=<?php echo $type?>" class="text-underline-hover">see more</a></td>
                                                </tr>
                                                <?php
                                            endforeach;
                                            

                                        endforeach;
                                    }
                                    else {
                                        ?>
                                        <tr>
                                            <td>No patients assigned yet.</td>
                                        </tr>
                                        <?php
                                    }
                                ?>

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