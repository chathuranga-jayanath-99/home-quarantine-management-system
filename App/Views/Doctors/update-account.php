<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>

<h1>Update Your Account</h1>

<form action="<?php echo URLROOT?>/doctor/update" method="POST"></form>
    <div class="">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $data['name'];?>">

    </div>
</body>
</html>