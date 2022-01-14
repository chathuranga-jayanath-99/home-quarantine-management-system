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
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
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
                    <form action="<?php echo URLROOT?>/child-patient/active" method="POST">
                        <div>
                        <?php 
                        $cnt = 0;
                        foreach ($childrenData as $childData) {
                            if ($childData->state === 'inactive' || $childData->state === 'pending') {
                                ?>
                                <div>
                                    <input class="form-check-input" type="radio" name="email" value="<?php echo $childData->email ?>">
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="email"><?php echo $childData->name ?></label>
                                    </span>
                                </div>
                                <?php
                                $cnt++;
                            } else {
                                ?>
                                <div>
                                    <input class="form-check-input" type="radio" name="email" value="<?php echo $childData->email ?> " disabled>
                                    <span class="mb-2 w-100">
                                    <label class="form-check-label" for="email"><?php echo $childData->name ?></label>
                                    </span>
                                </div>
                                <?php
                            }
                        }
                        
                        ?>
                        </div>
                            <input type="hidden" name="nic" value="<?php echo $nic ?>">
                        <?php
                        if($cnt > 0) {
                            ?>
                            <input type="hidden" name="changed" value="true">
                            <div class="d-flex align-items-center pt-3">
                                <input class="btn btn-primary ms-auto" type="submit" value="Activate">
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="d-flex align-items-center pt-5">
                                No inactive account found for the given NIC.
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
                            <input style="width:100px;" class="btn btn-success" type="submit" value="Yes">
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <a href="<?php echo URLROOT.'/phi' ?>">
                                <button style="width:100px;" class="btn btn-danger ">Cancel</button>
                        </a>
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