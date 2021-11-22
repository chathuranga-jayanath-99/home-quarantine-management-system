<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">Existing Accounts</h2>  
                    <?php if (sizeof($childrenData) > 0) { ?>
                        <div>
                            <h6 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">You can either activate one of the following existing accounts or create a new account.</h6>
                        </div>
                    <form action="<?php echo URLROOT?>/child-patient/active" method="GET">
                        <div>
                        <?php 
                        $cnt = 0;
                        foreach ($childrenData as $childData) {
                            if ($childData->state === 'inactive') {
                                ?>
                                    <input class="form-check-input" type="radio" name="id" value="<?php echo $childData->id ?>">
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="child"><?php echo $childData->name ?></label>
                                    </span>
                                <?php
                                $cnt++;
                            } else {
                                ?>
                                    <input class="form-check-input" type="radio" name="id" value="<?php echo $childData->id ?> " disabled>
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="child"><?php echo $childData->name ?></label>
                                    </span>
                                <?php
                            }
                        }
                        
                        ?>
                        </div>
                            <input type="hidden" name="nic" value="<?php echo $nic ?>">
                        <?php
                        if($cnt > 0) {
                            ?>
                            <div class="d-flex align-items-center">
                                <input class="btn btn-primary ms-auto" type="submit" value="Activate">
                            </div>
                            <?php
                        }
                        ?>
                    </form>
                    <?php
                    } else {
                        ?>
                        <div>
                            No existing accounts found
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <h2 class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create an Account</h2>

                    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
                        <div>
                            <h6 class="text-center h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">Do you want to continue account creation?</h6>
                        </div>
                        <input type="hidden" name="id_checked" value="yes">
                        <input type="hidden" name="new" value="yes">
                        <input type="hidden" name="NIC" value="<?php echo $nic ?>">
                        <div class="text-center">
                            <input class="btn btn-success" type="submit" value="Yes">
                            <span style="display:inline-block; width:50px"></span>
                            <a href="<?php URLROOT.'/child-patient/register' ?>">
                                <button class="btn btn-danger">Cancel</button>
                            </a>
                        </div>
                    </form>
                    </section>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    
</body>
</html>