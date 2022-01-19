<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $page = 'check-records';
    $subPage = '';
    include_once 'includes/navbar.php';
    ?>

<section class="vh-auto py-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                        <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
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

                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        View Medical History
                        </a>
    
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body bg-info">
                                <?php echo $medical_history; ?>
                            </div>
                        </div>

    <table id="table" class="table table-hover">
        <tr>
            <td>Date</td>
            <td><?php echo $record['datetime']; ?></td>
        </tr>
        <tr>
            <td>Temperature</td>
            <td>
                <?php 
                    if ($record['temperature'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Fever</td>
            <td>
                <?php 
                    if ($record['fever'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Cough</td>
            <td>
                <?php 
                    if ($record['cough'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Sore Throat</td>
            <td>
                <?php 
                    if ($record['sore_throat'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Short Breath</td>
            <td>
                <?php 
                    if ($record['short_breath'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Runny Nose</td>
            <td>
                <?php 
                    if ($record['runny_nose'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Chills</td>
            <td>
                <?php 
                    if ($record['chills'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Muscle Ache</td>
            <td>
                <?php 
                    if ($record['muscle_ache'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Headache</td>
            <td>
                <?php 
                    if ($record['headache'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Fatigue</td>
            <td>
                <?php 
                    if ($record['fatigue'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Abdominal Pain</td>
            <td>
                <?php 
                    if ($record['abdominal_pain'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Vomiting</td>
            <td>
                <?php 
                    if ($record['vomiting'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Diarrhea</td>
            <td>
                <?php 
                    if ($record['diarrhea'] == 1){
                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Other</td>
            <td><?php echo $record['other']; ?></td>
        </tr>

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
                            <button class="btn btn-dark" onclick="enterFeedback(this)">Enter Feedback</button>
                        </td>
                    </tr>
                
                <form action="<?php echo URLROOT?>/doctor/check-record" method="post">

                        <tr id="feedbackRow" style="display: none;">
                            <td>
                                <textarea class="form-control" name="feedback" cols="30" rows="4"><?php echo $record['feedback']; ?></textarea>
                            </td>
                        </tr>

    
                    
                    <tr>
                    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                    <td>
                            <div class="d-flex justify-content-start">
                                <input type="submit" name="submit" value="Mark as Read" class="btn btn-primary">
                            </div>
                    </td>
                    
                    </tr>
                    
                </form>
                <?php
            }
        }
        
    ?>
    </table>

    <div class="d-flex justify-content-end">
        <button id="goBackBtn" class="btn btn-warning">Go back</button>
    </div>

    

                        </div>
                    </div>  
                </div>
            </div>

            <div class="text-center mt-5 text-muted">
            <a href="<?php echo URLROOT?>/doctor/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
            </div>

        </div>
    </div>
</div>


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