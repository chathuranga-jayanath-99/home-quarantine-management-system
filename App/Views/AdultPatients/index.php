<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME QURANTINE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    <section>
        <div>

        </div>
    </section>
    <a href="<?php echo URLROOT;?>/adult-patient/logout">Logout</a>
    <h1>Welcome <?php echo $adultData->name ;?> ! </h1>

    <div class="">
        <h1><?php echo $adultData->name ;?></h1>
        <a href="<?php echo URLROOT; ?>/patient/symptoms">Record Symptoms</a>
    </div>

    <footer>
        <p>Author: Hege Refsnes<br>
        <a href="mailto:hege@example.com">hege@example.com</a></p>
    </footer>
</body>
</html>

