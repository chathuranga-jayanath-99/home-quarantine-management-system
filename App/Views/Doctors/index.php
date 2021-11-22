<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>
<body>

<section class="pt-3 vh-100" style="background-color: #eee;">
<div class="container h-100">

    <a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>
    
    <?php flash('update_result');?>

    <h1>Welcome Doctor <?php echo $_SESSION['doctor_name']?>!</h1>

    <a class="btn btn-primary" href="<?php echo URLROOT;?>/doctor/update">Upadate Account</a>

    <div class="container" >
        <h3>Total patients assigned to you</h3>
        <br>
        <P>Count: <?php echo $count;?></P>
        <a class="" href="<?php echo URLROOT; ?>/doctor/check-patients">Check all patients</a>
    </div>

</div>
</section>


</body>
</html>