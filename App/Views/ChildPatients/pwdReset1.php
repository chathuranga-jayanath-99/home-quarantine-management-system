<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Child Patient - Home Isolation System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    include 'phi-navbar.php';
?>
    <section class="vh-auto pt-5 pb-5" style="background-color: #eee; min-height:100vh;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h fw-bold mb-5 mx-1 mx-md-4 mt-4">Child-Patient<br />Password Reset</h2>
                    <div>
                        <h6 class="text-left h6 fw-bold mb-5 mx-1 mx-md-4 mt-4">Enter Guardian NIC</h6>
                    </div>
                    <form id="nic-form" action="<?php echo URLROOT?>/PHI/child-patient/password-reset" method='POST'>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline form-floating flex-fill mb-0">
                                <input onclick="checkNIC()" onchange="checkNIC()" onblur="checkNIC()" id="NIC" class="form-control" type="text" name="NIC" 
                                    value="<?php echo $data['NIC']?>" placeholder="Guardian NIC" required>
                                <label for="NIC"><i class="fa fa-id-card fa-lg me-3 fa-fw"></i>Guardian NIC</label>
                                <input type="hidden" name="id_checked" value="no">
                                <span id="nic_err" style="color: red;"><?php echo $data['nic_err']?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="btn btn-primary ms-auto" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="https://img.freepik.com/free-vector/set-doctor-nurse-team-cartoon-hand-drawn-cartoon-art-illustration_56104-753.jpg" width=700 height=700 class="img-fluid" alt="Sample image"> 
                </div>
                </div>
            </div>
            </div>
            <div class="text-center mt-5 text-muted">
                <a href="<?php echo URLROOT?>/child-patient/about-us" class="text-muted" style="text-decoration: none;">Copyright &copy; Code Devours</a>
			</div>
        </div>
        </div>
    </div>
    </section>
    <script src="../../static/js/validation-script.js"></script>
    <script>
        document.getElementById("nic-form").addEventListener('submit', submitRoutine);

        function checkNIC() {
            var nic = document.getElementById("NIC");
            var nic_err = document.getElementById('nic_err');
            var nic_c = nic.value.toUpperCase();
            nic.value = nic_c;
            if (!validator.validateNIC(nic_c)){
                nic_err.innerHTML = "Enter a valid NIC";
            }
            else{
                nic_err.innerHTML = ""
            }
        }

        function submitRoutine(e){
            var nic = document.getElementById("NIC");
            var nic_err = document.getElementById('nic_err');
            var nic_c = nic.value.toUpperCase();
            nic.value = nic_c;
            if (!validator.validateNIC(nic_c)){
                nic_err.innerHTML = "Enter a valid NIC";
                e.preventDefault();
            }
        }

    </script>
</body>
</html>