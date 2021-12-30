<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

<h1>
<?php 
    $name = 'Patient';
    if (isset($_GET['name'])){
        if(strcmp($_GET['name'], '') != 0){
            $name= $_GET['name'];
        }

    }
    echo $name.'\'s Record';
?>
</h1>


    <br>
    <a href="<?php echo URLROOT.'/doctor/view-medical-history?id='.$medical_history_id?>" class="btn btn-primary">View Medical History</a>
    <br>
    <br>
    <table class="table">
        <tr>
            <td>Date</td>
            <td><?php echo $record['datetime']; ?></td>
        </tr>
        <tr>
            <td>Fever</td>
            <td><?php echo $record['fever']; ?></td>
        </tr>
        <tr>
            <td>Temperature</td>
            <td><?php echo $record['temperature']; ?></td>
        </tr>


    <!-- </table> -->

    <br>
    <?php
        if(isset($_GET['task'])){
            if (strcmp($_GET['task'], 'view')== 0){
                ?>
                <tr>
                    <td>Feedback</td>
                    <td><?php echo $record['feedback']; ?></td>
                </tr>
                <?php
            }
            else if (strcmp($_GET['task'], 'mark') == 0){
                ?>
                <form action="<?php echo URLROOT?>/doctor/check-record" method="post">
                    <!-- <table> -->
                        <tr>
                            <td>Feedback : </td>
                            <td>
                                <textarea name="feedback" cols="30" rows="10"><?php echo $record['feedback']; ?></textarea>
                            </td>
                        </tr>
    
                    <!-- </table> -->
                    <tr>
                    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                    <td>
                    <input type="submit" name="submit" value="Mark as Read" class="btn btn-primary">
                    </td>
                    
                    </tr>
                    
                </form>
                <?php
            }
        }
        
    ?>
    </table>
    

</section>

</body>
</html>