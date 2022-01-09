<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    
    <h1>Welcome Admin <?php echo $_SESSION['admin_name']; ?></h1>

    <a href="<?php echo URLROOT; ?>/admin/user/manage-doctors">Manange Doctors</a>
    <a href="<?php echo URLROOT; ?>/admin/user/manage-PHIs">Manage PHIs</a>
</body>
</html>