<div class="row">
    <div class="col-12">
		<?= $this->Form->Create($footerContact, [ 'class'=>'card','id'=>'editfootercontact']) ?>
        <div class="card-header">
			<h4 class="card-title">Edit Footer Contact Details</h4> 
		</div>
        <div class="card-body">
			<div class="row">           
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Location</label>
					<?= $this->Form->control('location', [ 'label' => false, 'class'=> 'form-control']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Phone</label>
					<?= $this->Form->control('phone', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Days']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Email</label>
					<?= $this->Form->control('email', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Timings']) ?>
				  </div>
				</div>
			</div>
        </div>
        <div class="card-footer text-right">
			<div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
				<button type="submit" class="btn btn-primary ml-auto">Update</button>
			</div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
	<script>
		$(document).ready(function() {
		$("#editfootercontact").validate( {
		rules: {					
			location: {
				required:true
			},
			phone: {
				required:true
			},
			email: {
				required:true,
				email:true
			}
		},
		messages:{		
			location: {
				required:"Please Enter Location"
			},
			phone: {
				required:"Please Enter Phone no."
			},
			email: {
				required:"Please Enter Email",
				email:"Please Enter Valid Email Address"
			}
		}		
		});
		});
	</script>