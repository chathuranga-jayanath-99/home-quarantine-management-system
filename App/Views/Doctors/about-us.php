<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
<?php
    $page = '';
    $subPage = '';
    include_once 'includes/navbar.php'; 
?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="text-center">
        <iframe class="responsive-iframe" src="<?php echo URLROOT; ?>/home/about?logged=yes" style="width: 95vw; height: 90vh;"></iframe>
    </div>
    </section>
</body>
</html>