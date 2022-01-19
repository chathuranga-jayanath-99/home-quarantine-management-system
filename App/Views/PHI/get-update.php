<?php

use function PHPSTORM_META\type;

include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<?php 
$page = 'get-update';
include_once 'navbar.php';
?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
     
      <div class="col-lg-12 col-xl-10">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <!-- <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1"> -->
                <h2 class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4"> UPDATES </h2>
                
                <?php flash('check_fail'); ?>
                <?php flash('check_success'); ?>
                
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                        <th class="w-25"></th>
                        <th scope="col">Current Data</th>
                        <th scope="col">Changed Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-25 option">Name</td>
                            <td><?php echo $changes[0]['name']?></td>
                            <td><?php echo $changes[0]['name_change']?></td>
                        </tr>
                        <tr>
                            <td class="w-25 option">E-mail</td>
                            <td><?php echo $changes[0]['email']?></td>
                            <td><?php echo $changes[0]['email_change']?></td>
                        </tr>
                        <tr>
                            <td class="w-25 option">Contact Number</td>
                            <td><?php echo $changes[0]['contact_no']?></td>
                            <td><?php echo $changes[0]['contact_no_change']?></td>
                        </tr>
                    </tbody>
                    </table>

                    <?php 

                      if($email_exist){
                        echo $changes[0]['email_change'].' email address already in use' ;
                      }
                    
                    ?>
                        
                        
                        <form action="<?php echo URLROOT?>/PHI/approve-update " method="POST">
                            <input type="hidden" name="update_id" value="<?php echo $changes[0]['id']?>">
                            <input type="hidden" name="name_change" value="<?php echo $changes[0]['name_change']?>">
                            <input type="hidden" name="email_change" value="<?php echo $changes[0]['email_change']?>">
                            <input type="hidden" name="contact_no_change" value="<?php echo $changes[0]['contact_no_change']?>">
                            <input type="hidden" name="name" value="<?php echo $changes[0]['name']?>">
                            <input type="hidden" name="email" value="<?php echo $changes[0]['email']?>">
                            <input type="hidden" name="contact_no" value="<?php echo $changes[0]['contact_no']?>">
                            <input type="hidden" name="type" value="<?php echo $changes[0]['type']?>">
                            <input type="hidden" name="patient_id" value="<?php echo $changes[0]['patient_id']?>">

                            <?php
                              if($email_exist){ ?>
                                <button type="Submit" class="btn btn-success " disabled>Approve</button>
                            <?php
                              }
                              else { ?>
                                <button type="Submit" class="btn btn-success ">Approve</button> 
                            <?php
                              }
                            ?>
                            
                        </form>

                        <form action="<?php echo URLROOT?>/PHI/decline-update" method="POST">
                            <input type="hidden" name="update_id" value="<?php echo $changes[0]['id']?>">
                            <button type="Submit" class="btn btn-danger ">Decline</button> 
                        </form>
                               

              <!-- </div> -->
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