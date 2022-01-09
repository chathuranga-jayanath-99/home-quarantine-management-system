<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/adult-patient">
      <img src="<?php
      if ($_SESSION['adult_gender'] === 'male') {
        echo "https://www.pngitem.com/pimgs/m/10-106042_male-professional-avatar-icon-hd-png-download.png";
      } else {
        echo "https://www.pinclipart.com/picdir/middle/105-1057269_author-avatar-woman-doctor-icon-png-clipart.png";
      }
      ?>" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['adult_name']; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/adult-patient"><button class="btn <?php if ($page === 'home') {echo 'btn-success';} ?>">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/adult-patient/profile"><button class="btn <?php if ($page === 'profile') {echo 'btn-success';} ?>">Profile</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/record"><button class="btn <?php if ($page === 'record') {echo 'btn-success';} ?>">Record Symptoms</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/records-history"><button class="btn <?php if ($page === 'rec-history') {echo 'btn-success';} ?>">Record History</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/adult-patient/med-history"><button class="btn <?php if ($page === 'history') {echo 'btn-success';} ?>">Medical History</button></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <button class="btn <?php if ($page === 'update') {echo 'btn-success';} ?>">Update Account</button>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/adult-patient/edit-profile" <?php if ($subPage === 'profile') {echo 'style="color: green;"';} ?> >
              Update profile
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/adult-patient/edit-med-history"  <?php if ($subPage === 'history') {echo 'style="color: green;"';} ?>>
              Update Medical History
            </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/contact"><button class="btn <?php if ($page === 'contact') {echo 'btn-success';} ?>">Emergency Contact</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/password-change"><button class="btn <?php if ($page === 'pwd_change') {echo 'btn-success';} ?>">Change Password</button></a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/logout"><button class="btn btn-danger">Logout</button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>