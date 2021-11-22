<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>

    <section class="vh-100" style="background-color: #eee;">    
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <h2 class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Not Logged In</h2>
					<div>
						<img class="mx-auto d-block" src="https://image.freepik.com/free-vector/red-prohibited-sign-no-icon-warning-stop-symbol-safety-danger-isolated-vector-illustration_56104-912.jpg" width=200 class="img-fluid" alt="Sample image"> 
					</div>
                    <div class="mb-5 mx-1 mx-md-4 mt-4">
                        You are not logged in. Please <a href="<?php echo URLROOT.'/child-patient/login'?>">login</a> to continue.
					</div>
				</div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="https://img.freepik.com/free-vector/set-doctor-nurse-team-cartoon-hand-drawn-cartoon-art-illustration_56104-753.jpg" width=700 height=700 class="img-fluid" alt="Sample image"> 
                </div>
                </div>
            </div>
			</div>
            <div class="text-center mt-5 text-muted">
				Copyright &copy; Code Devours 
			</div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>