<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/adult-patient">
      <img src="https://www.pngitem.com/pimgs/m/10-106042_male-professional-avatar-icon-hd-png-download.png" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['phi_name']; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/PHI"><button class="btn <?php if ($page === 'home') {echo 'btn-success';} ?>">Home</button></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/adult-patient/profile"><button class="btn <?php if ($page === 'profile') {echo 'btn-success';} ?>">Profile</button></a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/addpatient"><button class="btn <?php if ($page === 'add-new') {echo 'btn-success';} ?>">Add New Account</button></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/active-existing-acc"><button class="btn <?php if ($page === 'active-acc') {echo 'btn-success';} ?>">Activate Account</button></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/searchPatient"><button class="btn <?php if ($page === 'search') {echo 'btn-success';} ?>">Search Patient</button></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/markpositive"><button class="btn <?php if ($page === 'mark-positive') {echo 'btn-success';} ?>">Mark Positive</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/PHI/markdead"><button class="btn <?php if ($page === 'mark-dead') {echo 'btn-success';} ?>">Mark Deaths</button></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/checkRecords"><button class="btn <?php if ($page === 'view-record') {echo 'btn-success';} ?>">View Patient Records</button></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/form-not-filled"><button class="btn <?php if ($page === 'form-not-filled') {echo 'btn-success';} ?>">Form not filled patients</button></a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/PHI/logout"><button class="btn btn-danger">Logout</button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>