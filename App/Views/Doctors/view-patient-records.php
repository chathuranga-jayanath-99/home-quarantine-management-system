<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>
<body>
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

<h1><?php echo $_GET['name'].'\'s Records';?></h1>
<br>
<table class="table">
    <tr>
        <td>Date</td>
        <td>Level</td>
        <td>Symptoms Diagnosed</td>
        <td>Special Notes</td>
        <td>Feedback Given</td>
        <td>Actions</td>
    </tr>

    <tr>
        <?php 
            if (sizeof($records) > 0){
                foreach ($records as $record)
                ?>
                <td><?php echo $record['datetime']; ?></td>
                <td><?php echo $record['level']; ?></td>
                <td><?php echo $record['checked_count']; ?></td>
                <td><?php echo $record['other']; ?></td>
                <td><?php echo $record['feedback']; ?></td>
                <td>
                    <a href="<?php echo URLROOT.'/doctor/check-record?id='.$record['id'].'&task=view&name='.$_GET['name']; ?>" class="btn btn-primary">
                    View More</a>
                </td>
                <?php
            }
            else{
                ?>
                <td>
                    No Records.
                </td>
                <?php
            }
        ?>
    </tr>
</table>

</body>
</body>
</html>