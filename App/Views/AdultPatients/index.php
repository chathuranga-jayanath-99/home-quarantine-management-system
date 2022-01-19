<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Adult Patient - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .exit-fade {
            opacity: 1;
            -webkit-transition: opacity 1000ms linear;
            transition: opacity 1000ms linear;
        }
    </style>
    <script>
        function removeRemDiv() {
            var rem_div = document.getElementById('rem-div');
            rem_div.style.opacity = '0';
            setTimeout(function(){rem_div.parentNode.removeAdult(rem_div);}, 1000);
        }

        function resizeRecordPage() {
            var frame = document.getElementById('record-frame');
            frame.style.height = frame.contentWindow.document.body.scrollHeight + 10 + 'px';
        }

        function showHide() {
            var hide_div = document.getElementById("hide-div");
            var hide_btn = document.getElementById("hide-btn");
            if (hide_div.style.display === "none") {
                hide_div.style.display = "block";
                hide_btn.innerHTML = 'Hide';
                resizeRecordPage();
                var location = 0;
                if (hide_div.offsetParent) {
                    do {
                        location += hide_div.offsetTop;
                    } 
                    while (hide_div = hide_div.offsetParent);
                }
                window.scroll(0,location);
            } else {
                hide_div.style.display = "none";
                hide_btn.innerHTML = 'Show';
            }
        }

        function scrollTo(div) {
            var location = 0;
            if (div.offsetParent) {
                do {
                    location += div.offsetTop;
                } while (obj = div.offsetParent);
            return [curtop];
            }
        }
    </script>
<body>
    <?php
    $page = 'home';
    $subPage = '';
    include_once 'navbar.php';
    ?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-20">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-20 col-xl-20 order-2 order-lg-1">
                            <h1 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome!</h1>
                            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
                                <div class="col">
                                    <div class="card border-dark mb-3 h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Account Status</h5>
                                        <h6 class="card-subtitle my-3 text-muted"><?php echo $state; ?></h6>
                                        <p class="card-text">Your account is currently <?php
                                            if ($state === 'Positive' || $state === 'Contact Person') {
                                                echo 'active. Please continue recording symptoms at least twice a day.';
                                            } else if ($state === 'Inactive') {
                                                echo 'inactive. You cannot make any changes to your account.';
                                            }
                                        ?></p><?php
                                        if ($state === 'Positive' || $state === 'Contact Person') {
                                            ?>
                                            <h6 class="card-subtitle mb-2 text-muted">Quarantine Period</h6>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th scope="col">Start Date</th>
                                                    <td><?php echo $adultObj->getStartQuarantineDate(); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">End Date</th>
                                                    <td><?php echo $adultObj->getEndQuarantineDate(); ?></td>
                                                </tr>
                                            </table>
                                            <?php
                                        } ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-dark mb-3 h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Last Record</h5>
                                        <?php
                                        if ($last) { ?>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th scope="col">Last recorded</th>
                                                    <td><?php echo $last['datetime']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Symptom Level</th>
                                                    <td><?php echo ucfirst($last['level']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Doctor checked</th>
                                                    <td><?php if ($last['checked']) {echo 'Yes';} else {echo 'No';} ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Feedback Given</th>
                                                    <td><?php if (!empty($last['feedback'])) {echo 'Yes';} else {echo 'No';} ?></td>
                                                </tr>
                                            </table>
                                            <div class="text-end">
                                                <a href="#" style="width:85px;" id="hide-btn" class="btn btn-danger mx-2" onclick="showHide();">Show</a>
                                            </div>
                                        <?php 
                                        } else {
                                            ?> <p class="card-text">No Record history to show.</p> <?php
                                        }
                                        ?>
                                    </div>
                                    </div>
                                </div>
                                <?php if ($notRecorded) { ?>
                                <div class="col">
                                <div id="rem-div" class="card border-dark mb-3 h-100 exit-fade">
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="spinner-grow text-danger me-3" role="status" aria-hidden="true"></span>Reminder</h5>
                                            <p class="card-text">You have not recorded symptoms in last 12 hours.</p>
                                            <div class="text-end">
                                                <a href="<?php echo URLROOT; ?>/adult-patient/record" style="width:85px;" class="btn btn-primary mx-2">Record</a>
                                                <a href="#" style="width:85px;" class="btn btn-danger mx-2" onclick="removeRemDiv();">Dismiss</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ($has_msg) { ?>
                                <div class="col">
                                    <div id="msg-div" class="card border-dark mb-3 h-100 exit-fade">
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="spinner-grow text-warning me-3" role="status" aria-hidden="true"></span>Notifications</h5>
                                            <p class="card-text">You have unread notifications</p>
                                            <div class="text-end">
                                                <a href="#" style="width:85px;" class="btn btn-primary mx-2" onclick="removeMsgDiv();" data-bs-toggle="offcanvas" data-bs-target="#demo" aria-controls="demo">View</a>
                                                <a href="#" style="width:85px;" class="btn btn-danger mx-2" onclick="removeMsgDiv();">Dismiss</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div id="hide-div" style="display:none;">
                                <iframe id="record-frame" class="responsive-iframe" src="<?php echo URLROOT; ?>/adult-patient/view-record?recordID=<?php echo $last['id']; ?>" style="width: 100%;" onload="resizeRecordPage()"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($last) { ?>
            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/adult-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div><?php
            } ?>
        </div>
        </div>
    </div>
    </section>
</body>
</html>