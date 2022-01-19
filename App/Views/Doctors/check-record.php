<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>
<?php 
    $page = 'records';
    include_once("navbar.php");
    ?>
<section class="container pt-3">

<a href="<?php echo URLROOT;?>/doctor">Home</a>
<a href="<?php echo URLROOT;?>/doctor/logout">Logout</a>
<button id="goBackBtn">Go back</button>

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
    
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        View Medical History
    </button>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <?php echo $medical_history; ?>
        </div>
    </div>

    <br>
    <br>
    <table id="table" class="table">
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
                    <tr>
                        <td>
                            <button class="btn btn-secondary" onclick="enterFeedback(this)">Enter Feedback</button>
                        </td>
                    </tr>
                
                <form action="<?php echo URLROOT?>/doctor/check-record" method="post">

                        <tr id="feedbackRow" style="display: none;">
                            <td>Feedback : </td>
                            <td>
                                <textarea name="feedback" cols="30" rows="10"><?php echo $record['feedback']; ?></textarea>
                            </td>
                        </tr>

    
                    
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

<script>
    document.getElementById("goBackBtn").addEventListener('click', ()=> {
        window.history.back();
    });

    function enterFeedback(element){

        var feedbackRowStyle = document.getElementById('feedbackRow').style;
        if (feedbackRowStyle.display == 'none'){
            feedbackRowStyle.display = 'table-row';
        }
        else{
            feedbackRowStyle.display = 'none';
        }

    }
    // function goBack(){
    //     window.history.back();
    // }
</script>
</body>
</html>