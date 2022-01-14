<?php
$notRecorded = false;
if ($last) {
    $time_difference = time() - strtotime($last['datetime']);
    $notRecorded = false;
    if ($state === 'Positive' || $state === 'Contact Person') {
        if ($time_difference > 43200) {
            $notRecorded = true;    // active account; 43200s = 12h
        }
    }
} else {
    if ($state === 'Positive' || $state === 'Contact Person') {
        $notRecorded = true;
    }
}
?>

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
          <a class="nav-link" <?php if ($notRecorded) { ?> data-bs-toggle="tooltip" data-bs-placement="bottom" title="You have not recorded symptoms in last 12 hours" <?php } ?> href="<?php echo URLROOT; ?>/child-patient/record"><button class="btn <?php if ($page === 'record') {echo 'btn-success';} ?>"><?php if ($notRecorded) { ?><span class="spinner-grow spinner-grow-sm text-danger me-2" id="rec-glow"></span><?php } ?>Record Symptoms</button></a>
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
            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/child-patient/edit-med-history"  <?php if ($subPage === 'history') {echo 'style="color: green;"';} ?> >
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
          <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" onclick="removeMsgDiv();">
            <i class="fa fa-bell-o fa-lg me-3 fa-fw"></i>
            <?php if ($has_msg) { ?><span class="spinner-grow spinner-grow-sm text-warning" id="msg-glow" <?php if ($notRecorded) { ?> data-bs-toggle="tooltip" data-bs-placement="bottom" title="You have unread Notifications" <?php } ?> ></span><?php } ?>
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

<script>
    function removeMsgDiv() {
        var msg_div = document.getElementById('msg-div');
        if (msg_div != null) {
          msg_div.style.opacity = '0';
          setTimeout(function(){msg_div.parentNode.removeChild(msg_div);}, 1000);
        }
        var msg_glow = document.getElementById('msg-glow');
        if (msg_glow != null) msg_glow.remove();
    }
</script>

<?php if ($notRecorded && $page !== 'record') { ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div class="toast border-0" role="alert" aria-live="assertive" aria-atomic="true" id="rec-toast">
            <div class="toast-header">
                <span class="spinner-grow spinner-grow-sm text-danger me-2" id="rec-glow"></span>
                <strong class="me-auto">Reminder</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                You have not recorded symptoms in last 12 hours.
                <div class="mt-2 pt-2">
                    <a href="<?php echo URLROOT; ?>/child-patient/record"><button type="button" class="btn btn-primary btn-sm">Record Now</button></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var rec_toast_el = document.getElementById('rec-toast')
        var rec_toast = bootstrap.Toast.getOrCreateInstance(rec_toast_el)
        rec_toast.show();
    </script>
<?php } ?>
