<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

<h1>Paitnet Details</h1>
    <br>
    <table class="table">
        <?php 
            foreach($patient as $key => $value):
                if ($key == 'id' || $key == 'password' ||$key == 'doctor_id'){
                    continue;
                }
                ?>
                    <tr>
                        <td><?php echo $key?></td>
                        <td><?php echo $value?></td>
                    </tr>
                <?php
            endforeach;
        ?>

    </table>

</section>

</body>
</html>