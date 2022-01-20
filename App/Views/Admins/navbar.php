<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin/user">
        <img src="https://buckinghambowlsclub.bowls.com.au/wp-content/uploads/sites/484/2020/05/administrator-logo-png-6.png" alt="" height="24" class="d-inline-block align-text-top">
        <?php echo $_SESSION['admin_name']; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>/admin/user"><button class="btn <?php if($page === 'home'){echo 'btn-success';} ?>">Home</button></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>/admin/user/manage-admin"><button class="btn <?php if($page === 'admins'){echo 'btn-success';} ?>">Manage Admins</button></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admin/user/manage-doctor"><button class="btn <?php if($page === 'doctors'){echo 'btn-success';} ?>">Manage Doctors</button></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admin/user/manage-PHI"><button class="btn <?php if($page === 'PHIs'){echo 'btn-success';} ?>">Manage PHIs</button></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/user/logout"><button class="btn btn-danger">Logout</button></a>
                </li>
            </ul>
        </div>
    </div>
</nav>