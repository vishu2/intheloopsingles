<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'home']); ?>"> <?= $this->Html->image('logo.png'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">

	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'home') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'home'])?>">Home</a></li>
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'aboutUs') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'about-us'])?>">About Us</a></li>
	  
	  
	  <?php  if((isset($user) && !empty($user))){ ?>
	  
	  <!--<li class="nav-item <?php echo (($this->request->getParam('action') == 'eventscal') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'eventscal'])?>">Events</a></li>-->	  
		<li class="nav-item dropdown user_dropdwn">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				 Locations
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<div class="row align-items-center9891125146">
					<div class="col-12">
						<a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal', base64_encode(1)])?>">Seattle</a>
						<a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal', base64_encode(2)])?>">Denver</a>
						<a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal', base64_encode(3)])?>">Austin</a>
					</div>
				</div>
			</div>
		</li>	  
	  <?php } else { ?>
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'events') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'events'])?>">Events</a></li>
	  
	  <?php } ?>
	  
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'stories') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'stories'])?>">Stories</a></li>
	  
	  <?php  if((isset($user) && !empty($user))){ ?>
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'travelListing') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'travelListing'])?>">Travel</a></li>
	  
	  <?php } else { ?>
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'travel') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'travel'])?>">Travel</a></li>
	  
	  <?php } ?>
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'contactUs') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'contact-us'])?>">Contact Us</a></li>
	</ul>
	<?php  if(isset($user) && !empty($user)){ ?>
		<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown user_dropdwn">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<span class="profile_pic"><?= $this->Html->image((!empty($user->user_profile->profile_image) ? '../files/member-profile/'.$user->user_profile->profile_image : 'default-user.png'), ['fullBase' => true])?></span> <?= ($user->role_id == 0) ? 'Admin' : $user->user_profile->first_name; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<div class="row align-items-center9891125146">
							<?php if($user->role_id == 3){ ?>
								<div class="col-7 balance">
									<h4><?= $user->user_profile->first_name.' '.$user->user_profile->last_name; ?></h4>
									<?php if(!empty($user->user_profile->membership)) { ?>
									<p>Membership Expires</p>
									<p class="date_p"><?= date('d M, Y', strtotime($user->user_profile->membership)); ?></p> 
									<?php } ?>
									<p>Event Credit Balance:</p>
									<span><?= $this->Number->currency((!empty($user->user_profile->credit_balance) ? $user->user_profile->credit_balance : 0), 'USD'); ?></span>
								</div>
							<?php } else{?>
								<div class="col-7 balance">
									<h4><?= $user->user_profile->first_name.' '.$user->user_profile->last_name; ?></h4>
									
									<p>Event Credit Balance:</p>
									<span>$$$$</span>
								</div>
							<?php }?>
							<div class="col-5">
								<?php if($user->role_id == 3){
									$myaccount = $this->Url->build(['controller' => 'users', 'action' => 'profile']);
								}else{
									$myaccount = $this->Url->build(['controller' => 'users', 'action' => 'dashboard', 'prefix' => 'admin']);
								}
								?>
								<a class="dropdown-item" href="<?= $myaccount; ?>">My Account</a>
								<a class="dropdown-item log_out" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>"><img src="img/log_out.svg" alt="">Log Out</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
	<?php }else{ ?>
		<div>
		  <a data-target="#joinus" data-toggle="modal"
							href="#joinus" class="btn orange_btn">Join Us</a>
		  <a href="<?= $this->Url->build(['action' => 'login'])?>" class="btn">Sign In</a>
		</div>
	<?php } ?>
  </div>
</nav>

	<div class="modal fade" id="joinus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered ">
			<div class="modal-content join_form-popup modal-xl">
                <div class="modal-header py-2">
					<h3 class="text-secondary mb-1 font-weight-bold">Join Us</h3> 
					<button type="button" class="close" data-dismiss="modal">&times;</button>                    
                </div>
                <div class="modal-body">
                	<div class="modal-pargrap pb-3">
                		<h5 class=""><b> Do Something <span>INCREDIBLE</span> for yourself.</b></h5>
						<p class="small pt-2">Fill out the form below or give us a call at <b>(866) 595-loop.</b><br>
						One of our specialists will answer all of your questions and help you get started having fun and meeting new single friends in Seattle, Denver, or Austin today!
						</p>
                	</div>
					<?= $this->Form->create(null, ['id' => 'join-us']) ?>
				<div class="form-row"> 
					<div class="form-group col-md-6"> 
						<?= $this->Form->control('lead_fname', ['class'=> 'form-control', 'placeholder' => 'First Name', 'label' =>false, 'div' => false]);?>
					</div>
					<div class="form-group col-md-6">
						<?= $this->Form->control('lead_lname', ['class'=> 'form-control', 'placeholder' => 'Last Name', 'label' =>false, 'div' => false]);?>
					</div>
				</div>
				<div class="form-row"> 
					<div class="form-group col-md-6">
						<?= $this->Form->control('lead_mobile', ['class'=> 'form-control', 'placeholder' => '(###) ###-####', 'label' =>false, 'div' => false, 'data-input-mask' => '(999) 999-9999']);?>
					</div>
					<div class="form-group col-md-6">
						<?= $this->Form->control('lead_email', ['class'=> 'form-control', 'placeholder' => 'Email address', 'label' =>false, 'div' => false]);?>
					</div>
				</div>
				<div class="form-row"> 
					<div class="form-group col-md-6">
						<?= $this->Form->select('lead_location', $locations, ['class'=> 'form-control', 'empty' =>'Select Location', 'label' =>false, 'div' => false, 'id'=>'lead-location']);?>
					</div>
					<div class="form-group lead_source col-md-6">
						<select class="form-control" name="lead_source" id="lead-source">
						  <option>How did you find us</option>
						</select>
					</div>
				</div>
				<div class="text-center border-top ">
					<button type="submit" class="btn mt-3">S u b m i t</button>
				</div>
					<?php echo $this->Form->end(); ?>
				</div>              
            </div>
        </div>
    </div>
	
	
<script>
	$(function() {
		
	    $('#lead-mobile').mask('(000) 000-0000');
		/**Homepage lead form submission start**/
	    $("#join-us").validate({
	        rules: {
	            lead_fname: {
	                required: true
	            },
	            lead_lname: {
	                required: true
	            },
	            lead_email: {
	                required: true,
	                email: true
	            },
	            lead_mobile: {
	                required: true
	            },
	            lead_location: {
	                required: true
	            },
	            lead_source: {
	                required: true
	            },
	        },
	        messages: {
	            lead_fname: {
	                required: "Please enter your first name",
	            },
	            lead_lname: {
	                required: "Please enter your last name",
	            },
	            lead_email: {
	                required: "Please enter your email address",
	            },
	            lead_mobile: {
	                required: "Please enter your contact",
	            },
	            lead_location: {
	                required: "Please select location",
	            },
	            lead_source: {
	                required: "Please select any source",
	            }
	        },
	        submitHandler: function(form, event) {
	        	var $form = $(form),
	        	$submitButton = $(this.submitButton);
	        	var form_location = $form.find('#lead-location').val();
	        	$.ajax({
	                    type: "POST", 
	                    url: "<?php echo $this->Url->build(['controller' => 'users', 'action' => 'ajax-lead-submission']);?>",
	                    data: {
	                        lead_name: $form.find('#lead-fname').val()+' '+$form.find('#lead-lname').val(),
	                        lead_phone: $form.find('#lead-mobile').val().replace(/\D/g,''),
							lead_mobile: $form.find('#lead-mobile').val().replace(/\D/g,''),
	                        lead_email: $form.find('#lead-email').val(),
	                        location_id: $form.find('#lead-location').val(),
	                        lead_source_id: $form.find('#lead-source').val(),
							
	                    },
						
	                    success: function(response) {
	                        var json = JSON.parse(response);
	                        if (json.status == 'success') {
	                            /*swal({
	                                icon: 'success',
	                                title: 'Success',
	                                text: 'Successfully sent.'
	                            });*/
	                           var newURL = "?name=" + $form.find('#lead-fname').val() + "%20" + $form.find('#lead-lname').val() + "&email=" + $form.find('#lead-email').val() + "&mobile=" + $form.find('#lead-mobile').val(); 
	                    	   jQuery('#join-us')[0].reset();
	                           if(form_location == '1'){
									window.location.href = "thank-you-seattle" + newURL;
								}else if(form_location == '2'){
									window.location.href = "thank-you-denver" + newURL;
								}else if(form_location == '3'){
									window.location.href = "thank-you-austin" + newURL;

								}
	                        } else {
	                            swal({
	                                icon: 'error',
	                                title: 'Oops...',
	                                text: json.message,
	                              });
	                        }

	                    }
	                });
	        
	            
	        }
	    });
	    /**Homepage lead form submission end**/

	    /*On change location loading Lead sources start*/
	    $(document).on('change', '#lead-location', function(){
	    	if($(this).val() !== ''){
	    		var $this = $(this);
	    		$.ajax({
	                    type: "POST",
	                    url: "<?php echo $this->Url->build(['controller' => 'users', 'action' => 'ajax-lead-source']);?>",
	                    data: {
	                        location_id: $this.val(),
	                        
	                    },
	                    success: function(response) {
	                    	
	                        var json = JSON.parse(response);

	                        $("#lead-source option").remove();
	                        var htmlOption = '<option>How did you find us</option>';
	                        $.each(json, function( key, value ) {
	                        	//console.log(key +'  '+ value);
							  htmlOption += '<option value="'+key+'">'+value+'</option>';
							});
							$("#lead-source").append(htmlOption)
	                    	//console.log(htmlOption);
	                    	return false;

	                    }
	                });
	    	}
	    });
	    /*On change location loading Lead sources end*/

	});
</script>