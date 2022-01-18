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
    

<body>
    <?php 
    $page = 'home';

    include_once('navbar.php'); 
    ?>

    
    <?php flash('update_result');?>
    <?php flash('doctor_reset_password');?>
    
    <section class="vh-auto py-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome!</h1>
                            

                            <div class="input-group">
                                <input type="text" id="search_input" class="form-control form-control-lg" placeholder="Search a patient" onkeyup="showSuggestionToEnter(event)">
                                <button  id="seacrch_btn" class="input-group-text btn btn-dark btn-lg" type="button" onclick="showSuggestions()">Search</button>
                                <button class="input-group-text btn btn-dark btn-lg" type="button" onclick="reset()">Clear</button>
                            </div>
                            
                            <div class="">
                                <p>Matches: <span id="search_result" style="font-weight:bold"></span></p>
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