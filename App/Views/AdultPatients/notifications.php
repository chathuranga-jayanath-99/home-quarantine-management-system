<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Child Patient - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="vh-auto pb-5">
        <div class="container h-100">
            <div class="sticky-top bg-white">
                <ul class="nav nav-pills nav-justified mb-4">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page === 'unread') {echo 'active';} ?>" href="<?php 
                        if ($page !== 'unread') {echo URLROOT.'/adult-patient/show-notifications?page=unread';}
                        else {echo '#';} ?>">Unread</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page === 'read') {echo 'active';} ?>" href="<?php 
                        if ($page !== 'read') {echo URLROOT.'/adult-patient/show-notifications?page=read';}
                        else {echo '#';} ?>">Read</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($page === 'all') {echo 'active';} ?>" href="<?php 
                        if ($page !== 'all') {echo URLROOT.'/adult-patient/show-notifications?page=all';}
                        else {echo '#';} ?>">All</a>
                    </li>
                </ul>
            </div>
            <?php if ($cnt > 0) { ?>
            <div>
            <?php
            if ($page === 'unread') {
                echo '
                <div class="text-center pb-3">
                    <div>
                        <a href="'.URLROOT.'/adult-patient/show-notifications" onclick="return markAllAsRead()">
                        <button class="btn btn-warning">Mark All as Read</button></a>
                    </div>
                </div>';
            }
            foreach ($notifications as $notification) {
            ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title <?php if ($notification->msg_read) {echo 'text-black-50';} ?>">
                        <?php 
                        if ($notification->sender_type === 'phi') { 
                            echo 'PHI:';
                        } else {
                            echo 'Doctor:';
                        }
                        ?>
                        </h5>
                        <p class="card-text ms-2 <?php if ($notification->msg_read) {echo 'text-black-50';} ?>"><?php echo $notification->content; ?></p>
                        <?php
                        if (!$notification->msg_read) {
                            echo '<a href="'.URLROOT.'/adult-patient/show-notifications?page='.$page.'" class="card-link"
                            onclick="return markAsRead('.$notification->id.')">Mark as Read</a>';
                        }
                        ?>
                        </div>
                </div>
            <?php
            }
                ?>
            </div>
            <?php } else { ?>
                <h5 class="card-title">No notification found</h5>
            <?php } ?>
        </div>
    </section>
</body>
<script src="../static/js/adult-notification.js"></script>
</html>
