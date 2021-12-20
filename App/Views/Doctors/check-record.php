<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>

<h1>Patient Record</h1>
    <br>
    <a href="<?php echo URLROOT.'/doctor/view-medical-history?id='.$medical_history_id?>" class="btn btn-primary">View Medical History</a>
    <br>
    <br>
    <table class="table">
       
        <tr>
            <td>Fever</td>
        </tr>
        <tr>
            <td>Temperature</td>
        </tr>


    </table>

    <br>
    <form action="<?php echo URLROOT?>/doctor/check-record" method="post">
        <table>
            <tr>
                <td>Feedbacl : </td>
                <td>
                    <textarea name="feedback" cols="30" rows="10"><?php echo $record['feedback']; ?></textarea>
                </td>
            </tr>

        </table>
        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
        <input type="submit" name="submit" value="Mark as Read" class="btn btn-primary">
    </form>

</section>

</body>
</html>