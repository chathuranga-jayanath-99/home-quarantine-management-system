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
    $page = 'home';

    include_once('includes/navbar.php'); 
    ?>

        
<section class="vh-auto py-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class=" order-2 order-lg-1">


                        <?php flash('update_result');?>
                        <?php flash('doctor_reset_password');?>

                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome!</h1>
                            
                            <div class="container card mb-5 h-auto col-md-10 col-lg-10 ">
                                <div class="card-body">
                                    <h5 class="card-title">Search a Patient</h5>
                                    <input type="text" id="search_input" class="form-control my-3 mx-2" placeholder="Search a patient" onkeyup="showSuggestionToEnter(event)">
                                    <button class="btn btn-primary mx-2 mb-3" id="seacrch_btn" onclick="showSuggestions()">Search</button>
                                    <button class="btn btn-primary mx-2 mb-3" onclick="reset()">Clear</button>
                                    <h6 class="card-subtitle mx-2 my-3 text-muted">Matches:</h6>
                                    <p class="card-text mx-3"><span id="search_result" style="font-weight:bold"></span></p>
                                    <a href="#"></a>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
                                
                                <div class="col">
                                    <div class="card border-dark mb-3 h-100">
                                        <div class="card-body">
                                            <p>Total patients assigned to you: <?php echo $count;?></p>
                                        </div>
                                    </div>   
                                </div>
                                
                            
                            </div>

                            <!-- <div class="container h-auto col-md-10 col-lg-10 my-3 text-center">
                                <nav class="navbar navbar-expand-lg">
                                    <div class="container-fluid justify-content-center">
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#actions" aria-controls="actions" aria-expanded="true" aria-label="Toggle navigation">
                                        <span class="btn btn-primary">Actions</span>
                                        </button>
                                        <div class="collapse navbar-collapse text-start card bg-success my-2" id="actions">
                                            <ul class="navbar-nav">
                                                <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/check-patients"><button class="btn">Check All Patients</button></a>
                                                </li><li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/check-records"><button class="btn">Check Records</button></a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/mark-quarantine-results"><button class="btn">Update Quarantine Periods</button></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div> -->
                            
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


    <script src="static/js/doctor-script.js">   
    </script>
</body>
</html>