<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>



<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-10">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
              <a href="<?php echo URLROOT; ?>">Main Page</a>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">PHI LOGIN</p>

                <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/PHI/login" method='POST'>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                     
                    <div class="form-outline flex-fill mb-0">
                      <!-- <label class="form-label" for="email">Email</label> -->
                      <input type="text" name="email" value="<?php echo $data['email']?>" class="form-control" placeholder="Email"/>
                      <span style="color:red"><?php echo $data['email_err']?></span>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <!-- <label class="form-label" for="password">Password</label> -->
                      <input type="password" name="password" value="<?php echo $data['password']?>" class="form-control" placeholder="Password" />
                      <span style="color:red"><?php echo $data['password_err']?></span>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg" value="LOGIN">Login</button>  
                     <!-- <input type="submit" value="LOGIN">  -->
                  </div>

                  <div class="text-center">
                        <a href="<?php echo URLROOT; ?>/PHI/register">Want to create an account?</a>
                    </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src= "https://cdn.dribbble.com/users/1475931/screenshots/10848109/media/cceef0db52d353328115239e84f2b7b3.png" width=700 height=700 class="img-fluid" alt="Sample image"> 

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

