<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Welcome</h1>
    <p>Hello from the <?php echo htmlspecialchars($name); ?>!</p>


    <ul>
        <li><a href="<?php echo URLROOT; ?>/doctor/login">Doctor</a></li>
        <li><a href="<?php echo URLROOT; ?>/child-patient/login">Child Patient</a></li>
        <li><a href="<?php echo URLROOT; ?>/adult-patient/login">Adult Patient</a></li>
        <li><a href="<?php echo URLROOT; ?>/PHI/login">PHI</a></li>
    </ul>

</body>
</html>