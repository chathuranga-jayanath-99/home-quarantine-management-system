<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Record History - Child Patient - Home Isolation System</title>
    <script type="text/javascript">
        function loadRecordPage(id) {
            document.getElementById('record-frame').src = "<?php echo URLROOT; ?>/child-patient/view-record?recordID=" + id;
        }

        function resizeRecordPage() {
            var frame = document.getElementById('record-frame');
            frame.style.height = frame.contentWindow.document.body.scrollHeight + 10 + 'px';
        }
    </script>
</head>
<body>
    <?php
    $page = 'rec-history';
    $subPage = '';
    include_once 'navbar.php';
    ?>
    <section class="vh-auto py-5" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                <div class="row">
                    <div class="col-md border-right d-flex flex-column align-items-center">
                        <div class="d-flex flex-column align-items-center text-center py-5" style="border-radius: 25px;">
                        <h5 class="text-left h5 fw-bold pb-3">Select a record to view</h1>
                            <form action="<?php echo URLROOT; ?>/child-patient/records-history" method="post">
                                <div>
                                <?php
                                    foreach($records as $record) {
                                ?>
                                    <div class="pb-3 align-middle">
                                        <input class="form-check-input" type="radio" name="records-n" id="record<?php echo $record->id; ?>" value="<?php echo $record->id; ?>" 
                                        onchange="loadRecordPage(<?php echo $record->id; ?>)">
                                        <span class="mb-2 w-100">
                                            <label class="form-check-label" for="record<?php echo $record->id; ?>"><?php echo $record->datetime; ?></label>
                                        </span>
                                    </div>
                                <?php
                                    }
                                    if ($has_more) {
                                ?>
                                    <input type="hidden" name="record_cnt" value="<?php echo ($rec_cnt + 10) ?>">
                                    <input class="btn btn-primary ms-auto" type="submit" value="Load More">
                                <?php
                                    }
                                ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-10 border-right">
                        <div>
                            <iframe id="record-frame" class="responsive-iframe" src="<?php echo URLROOT; ?>/child-patient/no-record-selected" style="width: 100%;" onload="resizeRecordPage()"></iframe>
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