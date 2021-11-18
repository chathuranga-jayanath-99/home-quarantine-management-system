<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="<?php echo URLROOT;?>/doctor">Home</a>
    <a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

    <h1>Your Patients</h1>
        
    <table>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Age</td>
        </tr>

        <?php
            if (sizeof($patients) > 0){
                $sn = 1;
                foreach ($patients as $patient):
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $patient->name; ?></td>
                        <td><?php echo $patient->age; ?></td>
                    </tr>
                    <?php

                endforeach;
            }
            else {
                ?>
                <tr>
                    <td>No patients assigned yet.</td>
                </tr>
                <?php
            }
        ?>

    </table>
    <div>
        
    </div>

    

</body>
</html>