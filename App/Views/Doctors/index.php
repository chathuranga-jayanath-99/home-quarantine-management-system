<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
<script>
    // document.getElementById("search_form").addEventListener("onsubmit", event.preventDefault());
</script>
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
        <!-- <P ><strong>Count: </strong></P> -->

        <div style="padding: 50px;        display: flex;        justify-content:  space-between;">
            <a class="btn btn-dark" href="<?php echo URLROOT; ?>/doctor/check-patients">Check all patients</a>
            <!-- <br> -->
            <a class="btn btn-dark" href="<?php echo URLROOT; ?>/doctor/check-records">Check Records</a>
            <!-- <br> -->
            <a class="btn btn-dark" href="<?php echo URLROOT; ?>/doctor/mark-quarantine-results">Mark Cured or Extend Quarantine</a>
        </div>
        
    </div>

</div>
</section>
    <script src="static/js/doctor-script.js">   
    </script>
</body>
</html>