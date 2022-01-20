<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <div class="container-fluid justify-content-left">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin/user">
      <img src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['admin_name']; ?>
    </a>
    <a href="<?php echo URLROOT; ?>/admin/user/manage-admin" class="navbar-brand ms-5"><i class="fa fa-arrow-circle-left fa-lg me-3 fa-fw"></i></a>
    <ol class="breadcrumb navbar-nav me-auto mb-2 mb-lg-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Manage Doctors</li>
      <li class="breadcrumb-item active" aria-current="page">View Doctor</li>
    </ol>
  </div>
</nav>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle" width="100px" src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png">
                            <span class="font-weight-bold"><?php echo $admin['name']; ?></span>
                            <span class="text-black-50"><?php echo $admin['email']; ?></span>
                            <!--span><div class="mt-5 text-center"><a href="<?php //echo URLROOT?>/admin/update" class="btn btn-primary">Edit Profile</a></div></span>-->
                            <span><div class="mt-3 text-center"><a class="m-2 btn btn-warning" href="<?php echo URLROOT.'/admin/user/reset-password'?>" onclick="resetRoutine(event, <?php echo $admin['id'];?>)">Change Password</a></div></span>
                        </div>
                    </div>
        <div class="col-md-6 border-right">
            <div class="d-flex flex-column p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">View Admin</h4>
                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-md-12">
                            <label class="labels">Name</label>
                            <p class="text-primary"><?php echo $admin['name']; ?></p>
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Email Address</label>
                            <p class="text-primary"><?php echo $admin['email']; ?></p>
                        </div>

                    </div>
            
            </div>
        </div>
            
                </div>
            </div>
        </div>

        <div class="text-center mt-5 text-muted pt-auto">
            Copyright &copy; Code Devours
        </div>
        
        </div>
    </div>
</div>

</section>
    <script>
        function resetRoutine(e, adminId){
            sessionStorage.setItem('reset_admin_id', adminId);
        }
    </script>
</body>

</html>