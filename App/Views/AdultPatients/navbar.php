
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
        </a>
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/adult-patient"><?php echo $_SESSION['adult_name']; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/record">Record Symptoms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/medhistory">Medical History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/adult-patient/profile">My Profile</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo URLROOT;?>/adult-patient/logout">Logout</a>
                </li>
            </ul>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form> -->
        </div>
    </div>
</nav>