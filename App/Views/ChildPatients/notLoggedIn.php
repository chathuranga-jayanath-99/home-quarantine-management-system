<?php include(APPROOT.'\App\Views\Includes\header.php'); ?>

<body>
    <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://www.tenethealth.com/images/global/newsroom-ccb/cardiology-heart-care-technology-doctor.jpg?sfvrsn=befe083e_1" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
                            <h2 class="fs-4 card-title fw-bold mb-4">Not Logged In</h2>
                            <div>
                                You are not logged in. Please <a href="<?php echo URLROOT.'/child-patient/login'?>">login</a> to continue.
                            </div>
                        </div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="<?php echo URLROOT; ?>/adPatient/register" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; Team19 
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>