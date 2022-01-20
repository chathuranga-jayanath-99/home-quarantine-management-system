<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<?php 
$page = 'view-record';
include_once 'navbar.php';
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


    <!-- <br>
    <a href="<?php echo URLROOT.'/PHI/view-medical-history?id='.$medical_history_id?>" class="btn btn-primary">View Medical History</a>
    <br> -->
    <br>
    <table class="table table-hover">
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
    <!-- </table> -->
    </table>
    

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

</body>
</html>