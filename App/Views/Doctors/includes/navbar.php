<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/doctor">
    <img src="<?php
      if ($_SESSION['doctor_gender'] === 'Male') {
        echo "https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png";
      } else if ($_SESSION['doctor_gender'] === 'Female') {
        echo "https://previews.123rf.com/images/grgroup/grgroup1705/grgroup170503271/78206085-colorful-portrait-half-body-of-female-doctor-vector-illustration.jpg";
      }
      ?>" alt="" height="50" class="d-inline-block align-text-top">
      <?php echo 'Dr. '.$_SESSION['doctor_name']; ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor"><button class="btn <?php if ($page === 'home') {echo 'btn-success';} ?>">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/view-profile"><button class="btn <?php if ($page === 'view-profile') {echo 'btn-success';} ?>">Profile</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/check-patients"><button class="btn <?php if ($page === 'check-patients') {echo 'btn-success';} ?>">Check Patients</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/check-records"><button class="btn <?php if ($page === 'check-records') {echo 'btn-success';} ?>">Check Records</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/mark-quarantine-results"><button class="btn <?php if ($page === 'mark-quarantine-results') {echo 'btn-success';} ?>">Mark Quarantine Result</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/update"><button class="btn <?php if ($page === 'update') {echo 'btn-success';} ?>">Update Account</button></a>
        </li>
        
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/doctor/logout"><button class="btn btn-danger">Logout</button></a>
        </li>
      </ul>
      
    </div>

    <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class= "nav-item">
        <a class="nav-link">
          <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" onclick="removeMsgDiv();">
            <i class="fa fa-bell-o fa-lg me-3 fa-fw"></i>
            <span class="spinner-grow spinner-grow-sm text-warning" id="msg-glow"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="You have unread Notifications"></span>         
          </button>
        </a>
      </li>
    </ul> -->

    </div>
</nav>

<!-- <div class="offcanvas offcanvas-end" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Notifications</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body text-center">
    <iframe src="" frameborder="0" height=95% width=95%></iframe>
  </div>
</div> -->