<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <div class="container-fluid justify-content-left">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/adult-patient">
      <img src="https://image.flaticon.com/icons/png/512/1022/1022382.png" alt="" height="24" class="d-inline-block align-text-top">
      <?php echo $_SESSION['phi_name']; ?>
    </a>
    <ol class="breadcrumb navbar-nav ms-5 me-auto mb-2 mb-lg-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $nav['page']; ?></li>
      <li class="breadcrumb-item active" aria-current="page">Child Patient</li>
      <?php if (isset($nav['subPage'])) { ?>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $nav['subPage']; ?></li>
      <?php } ?>
      <?php if ($nav['totalSteps'] > 0) { ?>
      <li class="navbar-nav ms-5 me-auto mb-2 mb-lg-0 text-muted"> Step <?php echo $nav['step']; ?> of <?php echo $nav['totalSteps']; ?></li>
      <?php } ?>
    </ol>
  </div>
</nav>