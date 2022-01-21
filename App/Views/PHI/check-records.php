<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>

<body>

<?php 
$page = 'view-record';
include_once 'navbar.php';
?>

<section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
     
      <div class="col-lg-12 col-xl-10">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <!-- <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1"> -->

                <h2 class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4"> RECORDS </h2>
                
                <?php flash('check_fail'); ?>
                <?php flash('check_success'); ?>

                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                                    <tr>
                        <?php
                            if (sizeof($records['adult']) > 0 || sizeof($records['child']) > 0){
                                $sn = 1;
                                foreach($records['adult'] as $record):
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                    <?php
                                    foreach($record as $key=>$value){
                                        if ($key == 'id'){
                                            continue;
                                        }
                                        ?>                            
                                                <td><?php echo $value?></td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <a href="<?php echo URLROOT.'/PHI/check-record?id='.$record['id'].'&task=mark&name='.$record['name']; ?>" class="btn btn-primary">View</a>
                                    </td>
                                    </tr>
                                    <?php
                                endforeach;

                                foreach($records['child'] as $record):
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                    <?php
                                    foreach($record as $key=>$value){
                                        if ($key == 'id'){
                                            continue;
                                        }
                                        ?>                            
                                                <td><?php echo $value?></td>
                                        <?php
                                    }
                                    ?>
                                    <td>
                                        <a href="<?php echo URLROOT.'/PHI/check-record?id='.$record['id'].'&task=mark&name='.$record['name']; ?>" class="btn btn-primary">View</a>
                                    </td>
                                    </tr>
                                    <?php
                                endforeach;
                            } 
                            else{
                                ?>
                                <tr>
                                    <td>No records yet.</td>
                                </tr>
                                <?php
                            }
                        ?>
                        </tr>
                        
                    </tbody>
                    </table>

    

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