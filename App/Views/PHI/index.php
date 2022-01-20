
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php 
$page = 'home';
include_once 'navbar.php';
?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-20 col-xl-20">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
             <div class="col-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                <h1 class="text-center h1 fw-bold ">Welcome !</h1> 
                 <div class="row row-cols-1 row-cols-md-2 g-2 mb-5">
                   
                    <div class="col">
                        <div class="card border-secondary mb-3 h-100">
                        <div class="card-body">
                        <h5 class="card-title mb-3 mt-3">Assigned Patients Details</h5>
                        <table class="table table-borderless table-hover">
                                                <tr>
                                                    <th scope="col">Total Assigned Patients</th>
                                                    <td><?php echo $count['total']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Contact Patients</th>
                                                    <td><?php echo $count['contact']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Positive Patients</th>
                                                    <td><?php echo $count['positive']; ?></td>
                                                </tr>
                        </table>
                                            <div class="text-end">
                                                <a href="<?php echo URLROOT; ?>/PHI/checkRecords" style="width:85px;" id="hide-btn" class="btn btn-danger mx-2">View</a>
                                            </div>
                                        
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-secondary mb-3 h-100">
                        <div class="card-body">

                        <h5 class="mt-3"> You have <?php echo $update_count;?> patient profile updates to approve.</h5>
                        <h5 class="mt-3"> You have <?php echo $form_not_filled['child'];?> form-not-filled child</h5>
                        <h5 class="mt-3"> You have <?php echo $form_not_filled['adult'];?> form-not-filled adult</h5>

                        <!-- <h5 class="card-title  mb-3 mt-3">Assigned Patients Details</h5> -->
                        
                                        
                        </div>
                        </div>
                    </div>


                 </div>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>