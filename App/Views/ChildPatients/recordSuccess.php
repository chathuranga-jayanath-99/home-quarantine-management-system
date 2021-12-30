<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppName</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<a href="<?php echo URLROOT;?>/child-patient/logout"><button class="btn-danger">Logout</button></a>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/child-patient/login" method='POST'>
                        <div class="row justify-content-center">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Successfully Recorded!</h1>
                            <div class="row g-2 justify-content-center">
                                <div class="col-auto align-items-center">
                                    <i class="fa fa-thermometer-half fa-lg me-3 fa-fw"></i>
                                </div>
                                <div class="col-auto">
                                    <?php
                                    $temp_f = $temperature * 9 / 5 + 32;
                                    echo $temperature."&#176C (".$temp_f."&#176F)";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 p-4">
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Symptom</th>
                                    <th scope="col">State</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <fieldset id="fever">
                                            <th scope="row">1</th>
                                            <td><div class="form-check-label">Fever</div></th>
                                            <td>
                                                <?php
                                                if($fever) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="cough">
                                            <th scope="row">2</th>
                                            <td><div class="form-check-label">Cough</div></th>
                                            <td>
                                            <?php
                                                if($cough) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="sore_throat">
                                            <th scope="row">3</th>
                                            <td><div class="form-check-label">Sore throat</div></th>
                                            <td>
                                            <?php
                                                if($sore_throat) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="short_breath">
                                            <th scope="row">4</th>
                                            <td><div class="form-check-label">Shortness of breath</div></th>
                                            <td>
                                            <?php
                                                if($short_breath) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="runny_nose">
                                            <th scope="row">5</th>
                                            <td><div class="form-check-label">Runny nose</div></th>
                                            <td>
                                            <?php
                                                if($runny_nose) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="chills">
                                            <th scope="row">6</th>
                                            <td><div class="form-check-label">Chills</div></th>
                                            <td>
                                            <?php
                                                if($chills) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 p-4">
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Symptom</th>
                                    <th scope="col">State</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <fieldset id="muscle_ache">
                                            <th scope="row">7</th>
                                            <td><div class="form-check-label">Muscle-aches</div></th>
                                            <td>
                                            <?php
                                                if($muscle_ache) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="headache">
                                            <th scope="row">8</th>
                                            <td><div class="form-check-label">Headache</div></th>
                                            <td>
                                            <?php
                                                if($headache) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="fatigue">
                                            <th scope="row">9</th>
                                            <td><div class="form-check-label">Fatigue</div></th>
                                            <td>
                                            <?php
                                                if($fatigue) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="abdominal_pain">
                                            <th scope="row">10</th>
                                            <td><div class="form-check-label">Abdominal pain</div></th>
                                            <td>
                                            <?php
                                                if($abdominal_pain) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="vomiting">
                                            <th scope="row">11</th>
                                            <td><div class="form-check-label">Vomiting</div></th>
                                            <td>
                                            <?php
                                                if($vomiting) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="diarrhea">
                                            <th scope="row">12</th>
                                            <td><div class="form-check-label">Diarrhea</div></th>
                                            <td>
                                            <?php
                                                if($diarrhea) {
                                                ?> 
                                                <i class="fa fa-check fa-lg me-3 fa-fw"></i> 
                                                <?php
                                                }
                                            ?>
                                            </td>
                                        </fieldset>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="mb-3">
                                <label for="other" class="form-label"><i class="fa fa-puzzle-piece fa-lg me-3 fa-fw"></i>Other</label>
                                <textarea class="form-control" id="other" name="other" rows="3" disabled><?php echo htmlspecialchars(trim($other)); ?></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-5 text-muted">
				Copyright &copy; Code Devours 
			</div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>
