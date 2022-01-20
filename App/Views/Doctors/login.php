<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-10">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

              <a href="<?php echo URLROOT; ?>" class="btn btn-warning">Main Page</a>
        
              <?php flash('register_success');?>
              
              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Doctor Login</p>

                <form id="log-form"  class="mx-1 mx-md-4" action="<?php echo URLROOT?>/doctor/login" method='POST'>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>               
                        
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="email">Email </label>
                            <input class="form-control" required type="text" name="email" id="email" value="<?php echo $data['email']?>" autofocus>
                            
                            <span id="email_err" style="color: red"><?php echo $data['email_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa fa-key fa-lg me-3 fa-fw"></i>                
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">Password </label>
                            <input class="form-control" required type="password" name="password" id="password" value="<?php echo $data['password']?>">
                            <span id="password_err" style="color: red"><?php echo $data['password_err']?></span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input class="btn btn-primary" type="submit" value="Log in">
                    </div>

                </form>  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src= "https://cdn.dribbble.com/users/1475931/screenshots/10848109/media/cceef0db52d353328115239e84f2b7b3.png" width=700 height=700 class="img-fluid" alt="Sample image"> 

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

<script src="../static/js/validation-script.js"></script>
<script>
  document.getElementById('log-form').addEventListener('submit', submitRoutine);

  function submitRoutine(e){
    var password_leng_limit = 4;

    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var email_err = document.getElementById('email_err');
    var password_err = document.getElementById('password_err');

    var err_count = 0;

    if (!validator.validateEmail(email.value)){
        email_err.innerHTML = "Enter a valid email";
        err_count++;
    }
    else{
        email_err.innerHTML = "";
    }

    // if (!validator.validatePassword(password.value, password_leng_limit)){
    //     email_err.innerHTML = "Password must be at least ";
    //     err_count++;
    // }
    // else{
    //     email_err.innerHTML = "";
    // }

    if (err_count){
        e.preventDefault();
    }
    else{

    }

  }

</script>
</body>
</html>