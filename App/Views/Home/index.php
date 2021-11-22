<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-auto">
    
      <div class="col-lg-12 col-xl-10 mt-5">
      <h1 class="text-center h2 fw-bold "> Home Quarantine Management System</h1> 
        <div class="card text-black mt-5" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
            
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <h2 class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">LOGIN</h2>
                
                  
                  <div class=" h5 text-center col-md-10">
                  <a href="<?php echo URLROOT; ?>/doctor/login"> Doctor
                    <!-- <button type="Submit" class="btn btn-danger btn-lg">Doctor</button> -->
                  </a> 
                  
                  </div>
                  <div class=" h5 text-center   col-md-10">

                  <a href="<?php echo URLROOT; ?>/PHI/login">PHI
                  <!-- <button type="Submit" class="btn btn-primary btn-lg">PHI</button> -->
                  </a> 
                  </div>
                  <div class=" h5 text-center   col-md-10">
                  <a href="<?php echo URLROOT; ?>/adult-patient/login">Adult Patient
                  <!-- <button type="Submit" class="btn btn-secondary btn-lg">Adult Patient</button> -->
                  </a> 
                  
                  </div>
                  <div class=" h5 text-center   col-md-10">
                  <a href="<?php echo URLROOT; ?>/child-patient/login">Child Patient
                  <!-- <button type="Submit" class="btn btn-success btn-lg">Child Patient</button> -->
                  </a> 
                  
                  </div>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
              <img src= "https://image.freepik.com/free-vector/detailed-doctors-nurses_52683-60321.jpg" width=800 height=900 class="img-fluid" alt="Sample image"> 
              <!-- <button type="Submit" class="btn btn-primary">Submit</button> -->
              <!-- <div class="col-md-10 col-lg-6 col-xl-1 d-flex align-items-center order-1 order-lg-2"> -->
              
              </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="text-center mt-5 text-muted">
				Copyright &copy; Code Devours 
			</div>
        
      </div>
      
    </div>
  
  </div>
</section>

</body>

</html>