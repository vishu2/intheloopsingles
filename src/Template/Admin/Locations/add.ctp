<div class="row">
    <div class="col-12">
		<?= $this->Form->Create($location, ['id'=> 'addlocation', 'class'=>'card']) ?>
        <div class="card-header">
			<h4 class="card-title">Add Location</h4> 
		</div>
        <div class="card-body">
			<div class="row">            
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Location</label>
					<?= $this->Form->control('location_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Location Name']) ?>
				  </div>
				</div>			
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Address</label>
					<?= $this->Form->control('address', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Address', 'type'=>'textarea']) ?>
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
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Zip</label>
					<?= $this->Form->control('zip', ['label' => false, 'class'=> 'form-control','placeholder' => 'Zip Code','type'=>'text' ]) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Phone</label>
					<?= $this->Form->control('phone', ['label' => false, 'class'=> 'form-control','placeholder' => 'Contact no.','type'=>'text']) ?>
				  </div>
				</div>		
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Fax</label>
					<?= $this->Form->control('fax', ['label' => false,'class'=> 'form-control','placeholder' => 'Fax','type'=>'text']) ?>
				  </div>
				</div>	
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Email</label>
					<?= $this->Form->control('location_path', ['label' => false,'class'=> 'form-control','placeholder' => 'Fax','type'=>'email']) ?>
				  </div>
				</div>
			</div>
        </div>
        <div class="card-footer text-right">
			<div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
				<button type="submit" class="btn btn-primary ml-auto">Send data</button>
			</div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
	<script>
		$(document).ready(function() {
		$("#addlocation").validate( {
		rules: {					
			location_name: {
				required:true
			},
			address: {
				required:true
			},	
			city: {
				required:true
			},	
			zip: {
				required:true
			},
			phone: {
				required:true
			},
			fax: {
				required:true
			},
			location_path {
				required:true
			}
		},
		messages:{		
			location_name: {
				required: "Please Enter Location Name"
			},
			address: {
				required: "Please Enter Address"
			},	
			city: {
				required: "Please Enter City"
			},	
			zip: {
				required: "Please Enter Zip Code"
			},
			phone: {
				required: "Please Enter Contact no."
			},
			fax: {
				required: "Please Enter Fax"
			},
			location_path {
				required:"Please Enter Email"
			}
		}		
		});
		});
	</script>