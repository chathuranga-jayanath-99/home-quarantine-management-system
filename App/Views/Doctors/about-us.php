<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<title>Home Isolation System</title>
</head>

<body>
<?php
    $page = '';
    $subPage = '';
    include_once 'includes/navbar.php'; 
?>
    <section style="background-color: #eee;">
    <div class="text-center">
        <iframe class="responsive-iframe" src="<?php echo URLROOT; ?>/home/about?logged=yes" style="width: 95vw; height: 90vh;"></iframe>
    </div>
    </section>
</body>
</html>