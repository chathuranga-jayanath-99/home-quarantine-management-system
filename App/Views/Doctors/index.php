<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>
<body>

<section class="container pt-3">

    <a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>
    <h1>Welcome Doctor!</h1>

    <div class="container">
        <h3>Total patients assigned to you</h3>
        <br>
        <P>Count: <?php echo $count;?></P>
        <a class="" href="<?php echo URLROOT; ?>/doctor/check-patients">Check patients</a>
    </div>

</section>


</body>
</html>