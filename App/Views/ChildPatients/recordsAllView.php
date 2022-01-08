<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>My Profile - Child Patient - Home Isolation System</title>
    <script type="text/javascript">
    function loadRecordPage(id) {
        document.getElementById('record-frame').src = "<?php echo URLROOT; ?>/child-patient/view-record?recordID=" + id;
    }
    </script>
</head>
<body>
    <?php
    $page = 'profile';
    $subPage = '';
    include_once 'navbar.php';
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <form action="#">
                                <div>
                                <?php
                                    foreach($records as $record) {
                                ?>
                                    <div class="pb-2">
                                        <input class="form-check-input" type="radio" name="records-n" id="record<?php echo $record->id; ?>" value="<?php echo $record->id; ?>" 
                                        onchange="loadRecordPage(<?php echo $record->id; ?>)">
                                        <span class="mb-2 w-100">
                                            <label class="form-check-label" for="record<?php echo $record->id; ?>"><?php echo $record->datetime; ?></label>
                                        </span>
                                    </div>
                                <?php
                                    }
                                ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col border-right">
                        <div class="pl-5">
                            <iframe id="record-frame" class="responsive-iframe" src="about:blank" style="width: 100%; height:80vh"></iframe>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="text-center mt-5 text-muted pt-auto">
                    <a href="<?php echo URLROOT?>/child-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
                </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>