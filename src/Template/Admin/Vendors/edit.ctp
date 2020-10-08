<div class="row">
    <div class="col-12">
		<?= $this->Form->Create($vendor, [ 'class'=>'card','id'=>'addvendor']) ?>
        <div class="card-header">
			<h4 class="card-title">Edit Vendor</h4> 
		</div>
        <div class="card-body">
			<div class="row">           
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Vendor Name</label>
					<?= $this->Form->control('vendor_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Vendor name']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Phone</label>
					<?= $this->Form->control('phone', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Phone','type'=>'number']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Address</label>
					<?= $this->Form->control('address', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Address']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">City</label>
					<?= $this->Form->control('city', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'City']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">State</label>
					<?= $this->Form->select('state_id', $states, ['label' => false, 'class'=> 'form-control']) ?>
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
		$("#addvendor").validate( {
		rules: {					
			vendor_name: {
				required:true
			},
			phone: {
				required:true,
				number: true
			},
			address: {
				required:true
			},
			city: {
				required:true
			}
		},
		messages:{		
			vendor_name: {
				required: "Please Enter Vendor Name"
			},
			phone: {
				required:"Please Enter Contact no.",
				number: "Please Enter a Valid Contact no."
			},
			address: {
				required: "Please Enter Address"
			},
			city: {
				required: "Please Enter City"
			}
		}		
		});
		});
	</script>