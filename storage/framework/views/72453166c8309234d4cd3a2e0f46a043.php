;
<?php $__env->startSection('content'); ?>;

<div class="content-body">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header">
						<h5 class="mb-0">Add Expenses</h5>
						<a   class="btn btn-primary" style="margin-right: 10px;">
							<i class="fa fa-close"></i> 
						</a>
					</div>
					
					<div class="card-body">
						<div class="row">
							
							<div class="col-xl-9 col-lg-8">
								<div class="row">
									<div class="col-xl-8 col-sm-6">
										<div class="mb-8">
										  <label for="exampleFormControlInput1" class="form-label text-primary">Date<span class="required">*</span></label>
										  <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="James">
										</div>
										<div class="mb-8">
										  <label  class="form-label text-primary">Category<span class="required">*</span></label>
												<input type="text" class="form-control" placeholder="2017-06-04" id="datepicker">
										</div>
										<div class="mb-3">
										  <label for="exampleFormControlInput3" class="form-label text-primary">Amount<span class="required">*</span></label>
										  <input type="decimal" class="form-control" id="exampleFormControlInput3" placeholder="hello@example.com">
										</div>
									
									</div>
									<div >
										<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/Finance/Expenses/expenses.blade.php ENDPATH**/ ?>