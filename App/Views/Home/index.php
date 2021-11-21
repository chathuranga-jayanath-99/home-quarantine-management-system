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
        <?php foreach ($colors as $color): ?>
            <li><?php echo htmlspecialchars($color); ?></li>
        <?php endforeach;?>
    </ul>


    <ul>
        <li><a href="<?php echo URLROOT; ?>/doctor/login">Doctor</a></li>
        <li><a href="">Patient</a></li>
        <li><a href="<?php echo URLROOT; ?>/PHI/login">PHI</a></li>
    </ul>

</body>
</html>