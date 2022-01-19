<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
<<<<<<< HEAD
    <?php
    $page = 'check-records';
    $subPage = '';
    include_once 'includes/navbar.php';
    ?>
=======
<?php 
    $page = 'records';
    include_once("navbar.php");
    ?>
<section class="container pt-3">
>>>>>>> master

<section class="vh-auto py-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                        <?php flash('check_fail'); ?>
                        <?php flash('check_success'); ?>

                        <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Records To Check</h1>

    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
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
                        <a href="<?php echo URLROOT.'/doctor/check-record?id='.$record['id'].'&task=mark&name='.$record['name']; ?>" class="btn btn-info">View</a>
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
                        <a href="<?php echo URLROOT.'/doctor/check-record?id='.$record['id'].'&task=mark&name='.$record['name']; ?>" class="btn btn-info">View</a>
                    </td>
                    </tr>
                    <?php
                endforeach;
            } 
            else{
                ?>
                <tr>
                    <td>No records to mark.</td>
                </tr>
                <?php
            }
        ?>
        </tr>

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