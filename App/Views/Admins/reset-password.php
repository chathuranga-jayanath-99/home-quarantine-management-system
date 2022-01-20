<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <div class="container-fluid justify-content-left">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin/user">
      <img src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['admin_name']; ?>
    </a>
    <a href="<?php echo URLROOT; ?>/admin/user/manage-doctor" class="navbar-brand ms-5"><i class="fa fa-arrow-circle-left fa-lg me-3 fa-fw"></i></a>
    <ol class="breadcrumb navbar-nav me-auto mb-2 mb-lg-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
      <li class="breadcrumb-item active" aria-current="page">Reset Paasword</li>
    </ol>
  </div>
</nav>
<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
							    <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Change Password</h1>
                                <form action="<?php echo URLROOT.'/admin/user/reset-password'?>" method="POST">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input type="password" name="current_password" class="form-control" required placeholder="Enter current password">
                                            <label for="">Current password: </label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input type="password" name="new_password" class="form-control" required placeholder="Enter new password">
                                            <label for="">New Password:</label>
                                            <span id="password_err" name="password_err" value="" style="color: red"><?php echo $data['password_err']?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline form-floating flex-fill mb-0">
                                            <input type="password" name="confirm_password" class="form-control" required placeholder="Confirm new password">
                                            <label for="">Confirm new password: </label>
                                        </div>
                                    </div>
                                    <input type="hidden" id="reset_admin_id" name="reset_admin_id">
                                    <input type="submit" class="btn btn-primary" value="Change Password" onclick="submitRoutine(event)">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script>
        function submitRoutine(e){
            var reset_admin_id = document.getElementById('reset_admin_id');
            reset_admin_id.value = sessionStorage.getItem('reset_admin_id');

            sessionStorage.removeItem('reset_admin_id');
        }

    </script>

</body>
</html>