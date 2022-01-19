<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/doctor">
      <img src="https://i.pinimg.com/564x/33/00/87/330087979d837e6d51faeb778ec503af.jpg" alt="" height="24" class="d-inline-block align-text-top">
      Dr. <?php echo $_SESSION['doctor_name']; ?>
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
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/check-patients"><button class="btn <?php if ($page === 'patients') {echo 'btn-success';} ?>">Check All Patients</button></a>
        </li><li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/check-records"><button class="btn <?php if ($page === 'records') {echo 'btn-success';} ?>">Check Records</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>/doctor/mark-quarantine-results"><button class="btn <?php if ($page === 'quarantine') {echo 'btn-success';} ?>">Update Quarantine Periods</button></a>
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
  </div>
</nav>