<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<?php 
$page = 'view-record';
include_once 'navbar.php';
?>

<section class="container pt-3">



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
    <a href="<?php echo URLROOT.'/PHI/view-medical-history?id='.$medical_history_id?>" class="btn btn-primary">View Medical History</a>
    <br>
    <br>
    <table class="table">
        <tr>
            <td>Date</td>
            <td><?php echo $record['datetime']; ?></td>
        </tr>
        <tr>
            <td>Temperature</td>
            <td><?php echo $record['temperature']; ?></td>
        </tr>
        <tr>
            <td>Fever</td>
            <td><?php echo $record['fever']; ?></td>
        </tr>
        <tr>
            <td>Cough</td>
            <td><?php echo $record['cough']; ?></td>
        </tr>
        <tr>
            <td>Sore Throat</td>
            <td><?php echo $record['sore_throat']; ?></td>
        </tr>
        <tr>
            <td>Short Breath</td>
            <td><?php echo $record['short_breath']; ?></td>
        </tr>
        <tr>
            <td>Runny Nose</td>
            <td><?php echo $record['runny_nose']; ?></td>
        </tr>
        <tr>
            <td>Chills</td>
            <td><?php echo $record['chills']; ?></td>
        </tr>
        <tr>
            <td>Muscle Ache</td>
            <td><?php echo $record['muscle_ache']; ?></td>
        </tr>
        <tr>
            <td>Headache</td>
            <td><?php echo $record['headache']; ?></td>
        </tr>
        <tr>
            <td>Fatigue</td>
            <td><?php echo $record['fatigue']; ?></td>
        </tr>
        <tr>
            <td>Abdominal Pain</td>
            <td><?php echo $record['abdominal_pain']; ?></td>
        </tr>
        <tr>
            <td>Vomiting</td>
            <td><?php echo $record['vomiting']; ?></td>
        </tr>
        <tr>
            <td>Diarrhea</td>
            <td><?php echo $record['diarrhea']; ?></td>
        </tr>
        <tr>
            <td>Other</td>
            <td><?php echo $record['other']; ?></td>
        </tr>
    <!-- </table> -->
    </table>
    

</section>

</body>
</html>