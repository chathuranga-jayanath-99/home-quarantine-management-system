<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<?php 
$page = 'view-record';
include_once 'navbar.php';
?>

<section class="container pt-3">



<h1>Records</h1>
    <br>
    <?php flash('check_fail'); ?>
    <?php flash('check_success'); ?>
    <table class="table">
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Age</td>
            <td>Type</td>
            <td>Actions</td>
        </tr>
        <tr>
        <?php
            if (sizeof($records['adult']) > 0 || sizeof($records['child']) > 0){
                $sn = 0;
                foreach($records['adult'] as $record):
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                    <?php
                    foreach($record as $key=>$value){
                        if ($key == 'id'){
                            continue;
                        }
                        ?>                            
                                <td><?php echo $value?></td>
                        <?php
                    }
                    ?>
                    <td>
                        <a href="<?php echo URLROOT.'/PHI/check-record?id='.$record['id'].'&task=mark&name='.$record['name']; ?>" class="btn btn-primary">View</a>
                    </td>
                    </tr>
                    <?php
                endforeach;

                foreach($records['child'] as $record):
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                    <?php
                    foreach($record as $key=>$value){
                        if ($key == 'id'){
                            continue;
                        }
                        ?>                            
                                <td><?php echo $value?></td>
                        <?php
                    }
                    ?>
                    <td>
                        <a href="<?php echo URLROOT.'/PHI/check-record?id='.$record['id'].'&task=mark&name='.$record['name']; ?>" class="btn btn-primary">View</a>
                    </td>
                    </tr>
                    <?php
                endforeach;
            } 
            else{
                ?>
                <tr>
                    <td>No records yet.</td>
                </tr>
                <?php
            }
        ?>
        </tr>

    </table>

</section>

</body>
</html>