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
                    <form class="mx-1 mx-md-4" action="<?php echo URLROOT?>/child-patient/record" method='POST'>
                        <div class="row justify-content-center">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Child-Patient <br /> Record Symptoms</h1>
                            <div class="row g-3 justify-content-center">
                                <div class="col-auto align-items-center">
                                    <i class="fa fa-thermometer-half fa-lg me-3 fa-fw"></i>
                                </div>
                                <div class="col-auto">
                                    <input type="number" step="0.01" class="col-form-control" name="temperature" min=0 max=120 placeholder="Temperature" style="width: 112px;">
                                </div>
                                <div class="col-auto">
                                    <fieldset id="temp-unit">
                                        <input type="radio" value="celsius" id="celsius" class="form-check-input" name="temp-unit" checked>
                                        <label for="celsius" class="form-check-label">&#176C</label>
                                        &nbsp;
                                        <input type="radio" value="fahrenheit" id="fahrenheit" class="form-check-input" name="temp-unit">
                                        <label for="fahrenheit" class="form-check-label">&#176F</label>
                                    </fieldset>
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
                                    <th scope="col">Yes</th>
                                    <th scope="col">No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <fieldset id="fever">
                                            <th scope="row">1</th>
                                            <td><div class="form-check-label">Fever</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="fever" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="fever" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="cough">
                                            <th scope="row">2</th>
                                            <td><div class="form-check-label">Cough</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="cough" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="cough" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="sore_throat">
                                            <th scope="row">3</th>
                                            <td><div class="form-check-label">Sore throat</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="sore_throat" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="sore_throat" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="short_breath">
                                            <th scope="row">4</th>
                                            <td><div class="form-check-label">Shortness of breath</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="short_breath" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="short_breath" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="runny_nose">
                                            <th scope="row">5</th>
                                            <td><div class="form-check-label">Runny nose</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="runny_nose" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="runny_nose" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="chills">
                                            <th scope="row">6</th>
                                            <td><div class="form-check-label">Chills</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="chills" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="chills" class="form-check-input" checked>
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
                                    <th scope="col">Yes</th>
                                    <th scope="col">No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <fieldset id="muscle_ache">
                                            <th scope="row">7</th>
                                            <td><div class="form-check-label">Muscle-aches</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="muscle_ache" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="muscle_ache" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="headache">
                                            <th scope="row">8</th>
                                            <td><div class="form-check-label">Headache</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="headache" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="headache" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="fatigue">
                                            <th scope="row">9</th>
                                            <td><div class="form-check-label">Fatigue</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="fatigue" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="fatigue" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="abdominal_pain">
                                            <th scope="row">10</th>
                                            <td><div class="form-check-label">Abdominal pain</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="abdominal_pain" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="abdominal_pain" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="vomiting">
                                            <th scope="row">11</th>
                                            <td><div class="form-check-label">Vomiting</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="vomiting" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="vomiting" class="form-check-input" checked>
                                            </td>
                                        </fieldset>
                                    </tr>
                                    <tr>
                                        <fieldset id="diarrhea">
                                            <th scope="row">12</th>
                                            <td><div class="form-check-label">Diarrhea</div></th>
                                            <td>
                                                <input type="radio" value="yes" name="diarrhea" class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="radio" value="no" name="diarrhea" class="form-check-input" checked>
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
                                <textarea class="form-control" id="other" name="other" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Submit">
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
