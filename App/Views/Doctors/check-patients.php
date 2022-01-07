<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
    
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

    <h1>Your Patients</h1>
        
    <table class="table">
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Age</td>
            <td>Actions</td>
        </tr>

        <?php
            if (sizeof($typed_patients['adult']) > 0 || sizeof($typed_patients['child']) > 0){
                $sn = 1;
                foreach ($typed_patients as $type => $patients):
                    
                    foreach($patients as $patient):
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $patient->name; ?></td>
                            <td><?php echo $patient->age; ?></td>
                            <td><a href="<?php echo URLROOT; ?>/doctor/check-patient?id=<?php echo $patient->id?>&type=<?php echo $type?>">see more</a></td>
                        </tr>
                        <?php
                    endforeach;
                    

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

</section>
    

</body>
</html>