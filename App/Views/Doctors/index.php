<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>
    <h1>Welcome Doctor!</h1>

    <div class="">
        <h2>Total patients assigned to you</h2>
        <P>Count: <?php echo $count;?></P>
        <a href="<?php echo URLROOT; ?>/doctor/check-patients">Check patients</a>
    </div>
</body>
</html>