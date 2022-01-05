<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/child-patient"><?php echo $_SESSION['child_name']; ?></a>
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
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/child-patient/med-history"><button class="btn <?php if ($page === 'history') {echo 'btn-success';} ?>">Medical History</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/child-patient/password-change"><button class="btn <?php if ($page === 'pwd_change') {echo 'btn-success';} ?>">Change Password</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/child-patient/logout"><button class="btn btn-danger">Logout</button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>