<?php include(APPROOT.'/App/Views/Includes/header.php'); ?>
<body>
    
    <div class="navbar">
        <a href="<?php echo URLROOT;?>/admin/user">Home</a>
        <a href="<?php echo URLROOT;?>/admin/user/manage-admin">Admin</a>
        
        <a href="<?php echo URLROOT; ?>/admin/user/manage-doctors">Doctor</a>
        <a href="<?php echo URLROOT; ?>/admin/user/manage-PHIs">PHI</a>

        <a href="<?php echo URLROOT;?>/admin/user/logout">Logout</a>
    </div>

    <h1>Welcome Admin <?php echo $_SESSION['admin_name']; ?></h1>

    <p>Admin count: <span><?php echo $data['adminCount']?></span></p>
    <p>Doctor count: <span><?php echo $data['doctorCount']?></span></p>
    <p>PHI count: <span><?php echo $data['phiCount']?></span></p>

</body>
</html>