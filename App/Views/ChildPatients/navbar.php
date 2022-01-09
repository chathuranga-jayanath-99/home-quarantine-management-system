<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/child-patient">
      <img src="<?php
      if ($_SESSION['child_gender'] === 'male') {
        echo "https://image.flaticon.com/icons/png/512/146/146007.png";
      } else {
        echo "https://cdn-icons-png.flaticon.com/512/146/146005.png";
      }
      ?>" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['child_name']; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/child-patient"><button class="btn <?php if ($page === 'home') {echo 'btn-success';} ?>">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/child-patient/profile"><button class="btn <?php if ($page === 'profile') {echo 'btn-success';} ?>">Profile</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/child-patient/record"><button class="btn <?php if ($page === 'record') {echo 'btn-success';} ?>">Record Symptoms</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/child-patient/records-history"><button class="btn <?php if ($page === 'rec-history') {echo 'btn-success';} ?>">Record History</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/child-patient/med-history"><button class="btn <?php if ($page === 'history') {echo 'btn-success';} ?>">Medical History</button></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <button class="btn <?php if ($page === 'update') {echo 'btn-success';} ?>">Update Account</button>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/child-patient/edit-profile" <?php if ($subPage === 'profile') {echo 'style="color: green;"';} ?> >
              Update profile
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/child-patient/edit-med-history"  <?php if ($subPage === 'history') {echo 'style="color: green;"';} ?>>
              Update Medical History
            </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/child-patient/contact"><button class="btn <?php if ($page === 'contact') {echo 'btn-success';} ?>">Emergency Contact</button></a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/child-patient/logout"><button class="btn btn-danger">Logout</button></a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class= "nav-item">
        <a class="nav-link">
          <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            <i class="fa fa-bell-o fa-lg me-3 fa-fw"></i>
          </button>
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="offcanvas offcanvas-end" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Notifications</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body text-center">
    <iframe src="<?php echo URLROOT; ?>/child-patient/show-notifications" frameborder="0" height=95% width=95%></iframe>
  </div>
</div>
