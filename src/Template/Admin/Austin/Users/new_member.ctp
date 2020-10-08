<div class="row">
    <div class="col-12">
		<?= $this->Form->Create($user, ['id'=> 'addMember', 'class'=>'card']) ?>
        <div class="card-header">
			<h4 class="card-title">Create New Member</h4> </div>
        <div class="card-body">
			<div class="row">            
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">First Name</label>
						<?= $this->Form->control('user_profile.first_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter first name']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Last Name</label>
						<?= $this->Form->control('user_profile.last_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter last name']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Email</label>
						<?= $this->Form->control('email', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'you@comany.com']) ?>
					</div>
				</div>          
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Password</label>
						<?= $this->Form->control('password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter password']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Phone</label>
						<?= $this->Form->control('user_profile.phone', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Please Enter Phone Number']) ?>
					</div>
				</div>           
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Mobile</label>
						<?= $this->Form->control('user_profile.mobile', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Please Enter Mobile Number']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Date of Birth</label>
						<div class="input-group date" id="dob">
						  <input class="form-control ignore"  name="user_profile[dob]" id="user-profile-dob" required="true"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Gender</label>
						<?= $this->Form->select('user_profile.sex', [1=>'Male', 2 =>'Female'], ['label' => false, 'class'=> 'form-control', 'empty' => '(Select)', 'default' => 1]) ?>
					</div>
				</div> 	
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">City</label>
						<?= $this->Form->control('user_profile.city', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Please Enter City']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">State</label>
						<?= $this->Form->select('user_profile.state_id', $states, ['label' => false, 'class'=> 'form-control']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Zip</label>
						<?= $this->Form->control('user_profile.zip', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Please Enter Zip']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Membership Expiry</label>
						<div class="input-group date" id="membership">
						  <input class="form-control ignore"  name="user_profile[membership]" id="user-profile-membership" required="true"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Address</label>
						<?= $this->Form->control('user_profile.address', ['label' => false, 'class'=> 'form-control']) ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
					<div class="mb-3">
						<label class="form-label">Status</label>
						<?= $this->Form->select('status', [1=>'Active', 0 =>'In Active'], ['label' => false, 'class'=> 'form-control', 'empty' => '(Select)', 'default' => 1]) ?>
					</div>
				</div>          
			</div>
        </div>
        <div class="card-footer text-right">
			<div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
				<button type="submit" class="btn btn-primary ml-auto">Save</button>
			</div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
<script>
		$(document).ready(function() {
		
		$('#dob').datetimepicker({
			useCurrent: true,
			format: "L",
			showTodayButton: true,
			toolbarPlacement: "bottom",
			icons: {
			  next: "fa fa-chevron-right",
			  previous: "fa fa-chevron-left",
			  today: 'texttoday',
			}
		});
		$('#membership').datetimepicker({
			useCurrent: true,
			format: "L",
			showTodayButton: true,
			toolbarPlacement: "bottom",
			icons: {
			  next: "fa fa-chevron-right",
			  previous: "fa fa-chevron-left",
			  today: 'texttoday',
			}
		});	
			
		$("#addMember").validate( {
		rules: {					
			email: {
				required:true
			},
			password: {
				required:true
			}
		},
		messages:{		
			email: {
				required: "Please Enter Email"
			},
			password: {
				required:"Please Enter Password"
			}
		}		
		});
		});
</script>