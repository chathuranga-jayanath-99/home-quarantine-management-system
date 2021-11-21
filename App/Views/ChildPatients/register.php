<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Child Patients</title>
</head>
<body>
    
    <h2>Existing Accounts</h2>  
    <?php if (sizeof($childrenData) > 0) { ?>
    <form action="<?php echo URLROOT?>/child-patient/activate" method='POST'">
        <?php 
        $cnt = 0;
        foreach ($childrenData as $childData) {
            if ($childData['state' === 'inactive']) {
                ?>
                <div>
                    <input type="radio" name="child" value="<?php echo $childData['name'] ?>">
                </div>
                <?php
                $cnt++;
            } else {
                ?>
                <div>
                    <input type="radio" name="child" value="<?php echo $childData['name'] ?> " disabled>
                </div>
                <?php
            }
        }
        ?>
            <input type="hidden" name="NIC" value="<?php echo $nic ?>">
        <?php
        if($cnt > 0) {
            ?>
            <div>
                <input type="submit" value="Activate">
            </div>
            <?php
        }
        ?>
    </form>
    <?php
    } else {
        ?>
        <div>
            No existing accounts found
        </div>
        <?php
    }
    ?>

    <h2>Create an Account</h2>

    <form action="<?php echo URLROOT?>/child-patient/register" method='POST'>
        <div>
            <h3>Do you want to continue account creation?</h3>
        </div>
        <div>
            <input type="submit" value="Yes">
        </div>
        <input type="hidden" name="id_checked" value="yes">
        <input type="hidden" name="new" value="yes">
        <input type="hidden" name="NIC" value="<?php echo $nic ?>">
    </form>

    <a href="<?php URLROOT.'/child-patient/register' ?>">
        <div>
            <button>Cancel</button>
        </div>
    </a>
    
</body>
</html>