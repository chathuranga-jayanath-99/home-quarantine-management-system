<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
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
  
                        <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><?php echo $_GET['name'].'\'s Records';?></h1>
<br>
<table class="table">
    <tr>
        <td>Date</td>
        <td>Level</td>
        <td>Symptoms Diagnosed</td>
        <td>Special Notes</td>
        <td>Feedback Given</td>
        <td>Actions</td>
    </tr>

    <tr>
        <?php 
            if (sizeof($records) > 0){
                foreach ($records as $record)
                ?>
                <td><?php echo $record['datetime']; ?></td>
                <td><?php echo $record['level']; ?></td>
                <td><?php echo $record['checked_count']; ?></td>
                <td><?php echo $record['other']; ?></td>
                <td><?php echo $record['feedback']; ?></td>
                <td>
                    <a href="<?php echo URLROOT.'/doctor/check-record?id='.$record['id'].'&task=view&name='.$_GET['name']; ?>" class="btn btn-primary">
                    View More</a>
                </td>
                <?php
            }
            else{
                ?>
                <td>
                    No Records.
                </td>
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