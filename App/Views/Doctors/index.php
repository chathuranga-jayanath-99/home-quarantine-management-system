<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    <?php 
    $page = 'home';
    include_once("navbar.php");
    ?>
<script>
    // document.getElementById("search_form").addEventListener("onsubmit", event.preventDefault());
</script>
<section class="vh-auto py-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-20 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="ol-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome Dr. <?php echo $_SESSION['doctor_name']?>!</h1>
                            <div class="container card mb-5 h-auto col-md-10 col-lg-10">
                                <div class="card-body">
                                    <h5 class="card-title">Search a Patient</h5>
                                    <input type="text" id="search_input" class="form-control my-3 mx-2" placeholder="Search a patient" onkeyup="showSuggestionToEnter(event)">
                                    <button class="btn btn-primary mx-2 mb-3" id="seacrch_btn" onclick="showSuggestions()">Search</button>
                                    <button class="btn btn-primary mx-2 mb-3" onclick="reset()">Clear</button>
                                    <h6 class="card-subtitle mx-2 my-3 text-muted">Matches:</h6>
                                    <p class="card-text mx-3"><span id="search_result" style="font-weight:bold"></span></p>
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="container h-auto col-md-10 col-lg-10 my-3 text-center">
                                <div class="btn-group-vertical" role="group" aria-label="Actions">
                                    <a href="<?php echo URLROOT; ?>/doctor/check-patients" class="btn btn-outline-primary">Check All Patients</a>
                                    <a href="<?php echo URLROOT; ?>/doctor/check-records" class="btn btn-outline-primary">Check Records</a>
                                    <a href="<?php echo URLROOT; ?>/doctor/mark-quarantine-results" class="btn btn-outline-primary">Mark Cured or Extend Quarantine</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
                Copyright &copy; Code Devours
			</div>
        </div>
        </div>
    </div>
    </section>
<!--
<section class="pt-3 vh-100" style="background-color: #eee;">
<div class="container h-100">

    <a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>
    
    <?php flash('update_result');?>

    <h1>Welcome Dr. <?php echo $_SESSION['doctor_name']?>!</h1>

    <a class="btn btn-primary" href="<?php echo URLROOT;?>/doctor/update">Upadate Account</a>

    <br><br>

    <div class="container">
        <input type="text" id="search_input" class="form-control" placeholder="Search a patient" onkeyup="showSuggestionToEnter(event)">
        <button id="seacrch_btn" onclick="showSuggestions()">Search</button>
        <button onclick="reset()">Clear</button>
        <p>Matches: <span id="search_result" style="font-weight:bold"></span></p>
        <a href="#"></a>
    </div>

    <div class="container" >
        <h3>Total patients assigned to you: <?php echo $count;?></h3>
        <br>
        //< <P ><strong>Count: </strong></P> >

        <div style="padding: 50px;        display: flex;        justify-content:  space-between;">
            <a class="btn btn-dark" href="<?php echo URLROOT; ?>/doctor/check-patients">Check all patients</a>
            //< <br> >
            <a class="btn btn-dark" href="<?php echo URLROOT; ?>/doctor/check-records">Check Records</a>
            //< <br> >
            <a class="btn btn-dark" href="<?php echo URLROOT; ?>/doctor/mark-quarantine-results">Mark Cured or Extend Quarantine</a>
        </div>
        
    </div>

</div>
</section>
-->
    <script src="static/js/doctor-script.js">   
    </script>
</body>
</html>