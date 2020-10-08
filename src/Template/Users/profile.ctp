<?php use Cake\Core\Configure; ?>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<section class="inner_banner signin_bnr">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">My Account</h3>
			<p></p>
			<h4>Welcome <strong><?= $user->user_profile->first_name; ?></strong> <?= $user->user_profile->last_name; ?></h4>
		</div>
	</div>
</section>
<section class="account_sec">
	<div class="container">
		<ul class="nav nav-tabs align-items-center" id="myTab" role="tablist">
		  <li class="nav-item">
			<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
				<span class="d-flex justify-content-center align-items-center"><i class="fa fa-user" aria-hidden="true"></i></span> My Profile
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" id="credits-tab" data-toggle="tab" href="#credits" role="tab" aria-controls="credits" aria-selected="false">
				<span class="d-flex justify-content-center align-items-center"><i class="fa fa-credit-card" aria-hidden="true"></i></span> Add Credits
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" id="events-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false">
				<span class="d-flex justify-content-center align-items-center"><i class="fa fa-calendar" aria-hidden="true"></i></span> My Events
			</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" id="transactions-tab" data-toggle="tab" href="#transactions" role="tab" aria-controls="transactions" aria-selected="false">
				<span class="d-flex justify-content-center align-items-center"><i class="fa fa-usd" aria-hidden="true"></i></span> My Transactions
			</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="account_form">
					<h4>Update Profile</h4>					
					<?= $this->Form->create($user, ['type' => 'file', 'id'=>'userprof']) ?>
						<div class="row">
							<div class="col-lg-3">
								<div class="avatar-upload">
									<!-- <div class="avatar-edit">
										<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
										<label for="imageUpload"></label>
									</div> -->
									<div class="avatar-edit">
										<?= $this->Form->file('user_profile.profile_image', ['type' => 'file', 'id'=>'imageUpload', 'label' => false, 'div' => false,'accept' => '.png, .jpg, .jpeg']);?>
										<label for="imageUpload"></label>	
									</div>
									<div class="avatar-preview">
										<?php if(!empty($user->user_profile->profile_image)){ ?>

												<div class="imagePreview" style="background-image: url(<?= $this->Url->build('../files/member-profile/'.$user->user_profile->profile_image)?>);">		
										<?php }else{ ?>
											<div class="imagePreview" style="background-image: url(<?= $this->Url->image('default-user.png')?>);">
										<?php }?>
										
										</div>

									</div>
								</div>
								<h5 class="text-center profile_name">Update Profile</h5>
							
							</div>
							<div class="col-lg-9">
								<?= $this->Flash->render('update_profile') ?>
								<div class="row">
									<div class="form-group col-md-4">
										<label>First Name *</label>
										<?= $this->Form->control('user_profile.first_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'First Name']) ?>
									</div>
									<div class="form-group col-md-4">
										<label>Last Name *</label>
										<?= $this->Form->control('user_profile.last_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Last Name']) ?>
									</div>
									<div class="form-group col-md-4">
										<label>Mobile *</label>								
										<?= $this->Form->control('user_profile.mobile', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Mobile']) ?>
									</div>
									<div class="form-group col-md-4">
										<label>Phone *</label>								
										<?= $this->Form->control('user_profile.phone', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Phone']) ?>
									</div>
									<div class="col-md-4">
										<label>Date of Birth *</label>									
										<div class="input-group date" id="birth">
							                <input class="form-control"  name="user_profile[dob]" value="<?= date('m/d/Y', strtotime($user->user_profile->dob))?>" required="true"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
							              </div>								 
									</div>
									<div class="form-group col-md-4">
										<label>Address *</label>			
										<?= $this->Form->control('user_profile.address', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Address', 'type'=>'text']) ?>
									</div>
									<div class="form-group col-md-4">
										<label>City *</label>									
										<?= $this->Form->control('user_profile.city', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'City']) ?>
									</div>
									<div class="form-group col-md-4">
										<label>State *</label>									
										<?= $this->Form->select('user_profile.state_id', $states,['label' => false, 'class'=> 'form-control', 'placeholder' => 'State']) ?>
									</div>
									<div class="form-group col-md-4">
										<label>Zip *</label>									
										<?= $this->Form->control('user_profile.zip', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Zip']) ?>
									</div>
								</div>
								<!--<button type="submit" class="btn">Update Profile</button>-->
								<?= $this->Form->button('Update Profile', ['type' => 'Submit', 'class'=>'btn']); ?>								
							</div>	
						</div>
					<?= $this->Form->end() ?>
				</div>
				<div class="account_form">
						<h4>Change Email</h4>	
						<?= $this->Flash->render('old_password_error') ?>
						<?= $this->Flash->render('duplicate_email') ?>				
						<?= $this->Form->create(null, ['id'=>'changeeml', 'url' => ['controller' => 'Users','action' => 'change_email']
						]); ?>
						<div class="row">
							<div class="form-group col-md-4 col-lg-3">
								<label>Password *</label>
								<?= $this->Form->control('check_password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Current Password', 'type' => 'password']) ?>
							</div>
							<div class="form-group col-md-4 col-lg-3">
								<label>New Email *</label>
								<?= $this->Form->control('email', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'New Email', 'id'=>'email', 'type'=>'email']) ?>
							</div>
						</div>
						<!--<button type="submit" class="btn">Change Email</button>-->
						<?= $this->Form->button('Change Email', ['type' => 'Submit', 'class'=>'btn']); ?>
						<?= $this->Form->end() ?>
				</div>
				<div class="account_form">
					<h4>Change Password</h4>
					<?= $this->Flash->render('change_password') ?>
					<?= $this->Form->create(null, ['id'=>'changepwd', 'url' => ['controller' => 'Users','action' => 'change_password']
					]); ?>
					<div class="row">
						<div class="form-group col-md-4 col-lg-3">
							<label>Password *</label>
							<?= $this->Form->control('old_password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Current Password','type'=>'password']) ?>
						</div>
						<div class="form-group col-md-4 col-lg-3">
							<label>New Password *</label>
							<?= $this->Form->control('password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'New Password','type'=>'password','id'=>'pwd1']) ?>
						</div>
						<div class="form-group col-md-4 col-lg-3">
							<label>Confirm Password*</label>
							<?= $this->Form->control('confirm_password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Confirm Password','type'=>'password','id'=>'pwd2']) ?>
						</div>
					</div>
					<?= $this->Form->button('Change Password', ['type' => 'Submit', 'class'=>'btn']); ?>
					<?= $this->Form->end() ?>
				</div>
			</div>
			<div class="tab-pane fade" id="credits" role="tabpanel" aria-labelledby="credits-tab">
				<div class="account_form">
					<h4>Add Credits</h4>
					<div class="payment_box">
						<?= $this->Form->create(null, ['id'=>'payment-form']); ?>
							<input type="hidden" name="location" id="location" class="form-control" value="<?= $user->location_id ?>">
							
							<div class="d-flex align-items-center justify-content-center custom_radio">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="amount" id="inlineRadio1" value="25">
								  <label class="form-check-label" for="inlineRadio1">$25</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="amount" id="inlineRadio2" value="50">
								  <label class="form-check-label" for="inlineRadio2">$50</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="amount" id="inlineRadio3" value="75">
								  <label class="form-check-label" for="inlineRadio3">$75</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="amount" id="inlineRadio4" value="100">
								  <label class="form-check-label" for="inlineRadio4">$100</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="amount" id="inlineRadio5" value="150">
								  <label class="form-check-label" for="inlineRadio5">$150</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="amount" id="inlineRadio6" value="200">
								  <label class="form-check-label" for="inlineRadio6">$200</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-control" name="custom_amount" id="custom_amount">
								  <label class="form-check-label" for="inlineText">Other</label>
								</div>
							</div>
							<div class="row">
							  <div class="form-group col-md-6 col-lg-5">
								<label>Name of Card *</label>
								<input type="text" name ="card_name" class="form-control" placeholder="">
							  </div>
							  <div class="form-group col-md-6 col-lg-5">
								<label>Card Number *</label>
								<div id="card-element" class="form-control"></div>
								<div id="payment-result"></div>
								<!-- <input type="text" class="form-control" placeholder=""> -->
							  </div>
							  <!-- <div class="form-group col-md-6 col-lg-5">
								<div id="payment-result"></div>
							  </div> -->
							  <!-- <div class="form-group col-md-12 col-lg-2">
								<div class="payment_div">
									<a href="#" title=""><?php $this->Html->image('pay_logo1.png'); ?></a>
									<a href="#" title=""><?php $this->Html->image('pay_logo2.png'); ?></a>
									<a href="#" title=""><?php $this->Html->image('pay_logo3.png'); ?></a>
									<a href="#" title=""><?php $this->Html->image('pay_logo4.png'); ?></a>
								</div>
							  </div> -->
							  <!-- <div class="form-group col-md-6 col-lg-5">
								  <div class="d-flex justify-content-between sec_code">
										<div class="year_month form-group">
											<label>Expires *</label>
											<div class="d-flex">
												<select class="form-control" id="exampleFormControlSelect1">
												  <option>MM</option>
												  <option>2</option>
												  <option>3</option>
												  <option>4</option>
												  <option>5</option>
												</select>
												<select class="form-control" id="">
												  <option>YY</option>
												  <option>2</option>
												  <option>3</option>
												  <option>4</option>
												  <option>5</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label>Security Code *</label>
											<input type="text" class="form-control" placeholder="CVV">
										</div>
								  </div>
							  </div> -->
							  <!-- <div class="form-group col-md-6 col-lg-5">
								<label>Zip *</label>
								<input type="text" class="form-control" placeholder="Zip (Card Billing Address)">
							  </div> -->
						  </div>
						  <p>I understand that I must use my credits during the duration of my membership with In the Loop, LLC. I understand credits over $25 will not be refunded. I understand I cannot gift my credits to another person.</p>
						  <button type="submit" class="btn">Make Payment</button>
						<?= $this->Form->end() ?>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">
				<div class="account_form">
					<h4>Event Details</h4>
					<div class="payment_box" style="overflow-x:auto;">
						<table style="width:100%;">
							<tr>
							  <th>Sr. No.</th>
							  <th>Event Name</th>
							  <th>Registration Date</th>
							  <th>Venue</th>
							  <th>Event Fee</th>
							</tr>
							<?php $i=1; foreach ($eventRegistrations as $eventRegistration):?>							
								<tr>
								  <td><?= $i ?>.</td>
									<td><?= $eventRegistration->event->event_name; ?></td>
									<td><?= $eventRegistration->created; ?></td>
									<td class="profile_venu"><?= $eventRegistration->event->venue_address; ?></td>
									<td><span class="badge badge-primary"><?= $this->Number->currency($eventRegistration->event->event_fee, 'USD'); ?></span></td>
									
								</tr>
							<?php $i++; endforeach; ?>
						</table>						
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
				<div class="account_form">
					<h4>Transaction Details</h4>
					<div class="payment_box" style="overflow-x:auto;">
						<table style="width:100%;">
							<tr>
							  <th>Sr. No.</th>
							  <th>Amount Paid</th>
							  <th>Transaction ID</th>
							  <th>Payment Status</th>
							  <th>Transaction Date</th>
							</tr>
							<?php $i=1; foreach ($transactions as $transaction):?>
							<tr>
							  <td><?= $i ?>.</td>
							  <td><span class="badge badge-primary"><?= $this->Number->currency($transaction->amount_paid/100, 'USD'); ?></span></td>
							  <td><?= $transaction->stripe_charge_id; ?></td>
							  <td><span class="badge badge-success"><?= $transaction->payment_status; ?></span></td>
							  <td><?= date('m/d/Y', strtotime($transaction->transaction_date)); ?></td>
							</tr>
							<?php $i++; endforeach; ?>
						</table>						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://js.stripe.com/v3/"></script>
<script>
	$(document).ready(function(){
	$("input[type='radio']").change(function(){
		var customamount =  document.getElementById('custom_amount');
		customamount.value = '';		
	});
	document.getElementById("custom_amount").onkeyup = function() {
		$('input[type="radio"]').prop('checked', false);
	}
	});
</script>
<script>
$(function() {
	var $form = $("#payment-form");
   		$form.validate( {
		rules: {					
			custom_amount: {
				number:true
			}
		},
		messages:{		
			custom_amount: {
				number:"Please Enter Valid Amount"
			}
		}	
	});
	
	//var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');	
	
	if ($("#location").val() == 1) {
	var public_key = '<?= Configure :: read ('seattle_publickey'); ?>';
	} 
	else if ($("#location").val() == 2)
	{
	var public_key = '<?= Configure :: read ('denver_publickey'); ?>'
	}
	else {
	var public_key = '<?= Configure :: read ('austin_publickey'); ?>'
	}
	
	var stripe = Stripe(public_key);  
	
	var elements = stripe.elements();
	var cardElement = elements.create('card');
	cardElement.mount('#card-element');

	var form = document.getElementById('payment-form');

	var resultContainer = document.getElementById('payment-result');
	cardElement.on('change', function(event) {
	  if (event.error) {
	    resultContainer.textContent = event.error.message;
	  } else {
	    resultContainer.textContent = '';
	  }
	});

	form.addEventListener('submit', function(event) {
	  event.preventDefault();
	  resultContainer.textContent = "";
	  stripe.createPaymentMethod({
	    type: 'card',
	    card: cardElement,
	  }).then(handlePaymentMethodResult);
	});

	function handlePaymentMethodResult(result) {
	  if (result.error) {
	    // An error happened when collecting card details, show it in the payment form
	    resultContainer.innerHTML = "<p style='color:red;'>"+ result.error.message +"</p>";
	  } else {
	  	var amount = 0;
	  	if($("#custom_amount").val() != ""){
	  	
	  		amount = $("#custom_amount").val();
	  	}else{
	  		amount = $(".form-check-input:checked"). val();
	  	}

	  	if(amount == 0){
	  		swal({
                icon: 'error',
                title: 'Oops...',
                text: "Please enter amount.",
              });
	  		return false;
	  	}
	  	
	  	
	    // Otherwise send paymentMethod.id to your server (see Step 3)
	    fetch('/users/pay', {
	      method: 'POST',
	      headers: { 'Content-Type': 'application/json' },

	      body: JSON.stringify({amount: amount, payment_method_id: result.paymentMethod.id })
	    }).then(function(result) {
	      return result.json();
	    }).then(handleServerResponse);
	  }
	}

	function handleServerResponse(responseJson) {
	  if (responseJson.error) {
	    // An error happened when charging the card, show it in the payment form
	    resultContainer.innerHTML = "<p style='color:red;'>"+ responseJson.error +"</p>";
	  } else {
	    // Show a success message
	    swal({
            icon: 'success',
            title: 'Success',
            text: 'Payment Done Successfully.'
        });
        setTimeout(function () {
	    	location.reload(true);
	    }, 2000);
	  }
	}
	});
</script>
<script>
$(document).ready(function(){
	$('#dob').mask('00/00/0000');
	
	$("#userprof").validate({
	        rules: {
	            "user_profile[first_name]": {
	                required: true
	            },
	            "user_profile[last_name]": {
	                required: true
	            },
				"user_profile[mobile]": {
	                required: true,
					number:true
	            },
				"user_profile[phone]": {
	                required: true,
					number:true
	            },
				"user_profile[dob]": {
	                required: true
	            },
				"user_profile[address]": {
	                required: true
	            },
				"user_profile[city]": {
	                required: true
	            },
				"user_profile[state]": {
	                required: true
	            },
				"user_profile[zip]": {
	                required: true
	            }
	        },
	        messages: {
	            "user_profile[first_name]": {
	                required: "Please enter your first name"
	            },
	            "user_profile[last_name]": {
	                required: "Please enter your last name"
	            },
				"user_profile[mobile]": {
	                required: "Please enter your Mobile",
					number:"Please enter a valid number"
	            },
				"user_profile[phone]": {
	                 required: "Please enter your last name",
					 number:"Please enter a valid number"
	            },
				"user_profile[dob]": {
	                 required: "Please enter your Date of Birth"
	            },
				"user_profile[address]": {
	                 required: "Please enter your address"
	            },
				"user_profile[city]": {
	                 required: "Please enter your city"
	            },
				"user_profile[state]": {
	                 required: "Please enter your state"
	            },
				"user_profile[zip]": {
	                 required: "Please enter your Zip code"
	            }
	        }
		});	
  
	$("#changeeml").validate({
	        rules: {
	            check_password: {
	                required: true
	            },
	            email: {
	                required: true,
					email:true
	            }
	        },
	        messages: {
	            check_password: {
	                required: "Please enter your current Password"
	            },
	            email: {
	                required: "Please enter your New Email",
					email:"Please Enter a Valid Email"
	            }
	        }
		});
	
	$("#changepwd").validate({
		rules: {
			old_password: {
				required: true
			},
			password: {
				required: true,
				minlength:6
			},
			confirm_password: {
				required: true,
				minlength:6,
				equalTo: '#pwd1'
			}
			
		},
		messages: {
			old_password: {
				required: "Please enter your current Password"
			},
			password: {
				required: "Please enter your New Password",
				minlength:"Please enter at least 6 characters."
			},
			confirm_password: {
				required: "Please enter your New Password Again",
				minlength:"Please enter at least 6 characters.",
				equalTo: "It does not match your new password"
			}
		}
	});

	$('.date').datetimepicker({
        useCurrent: true,
        format: "L",
        //defaultDate: "moment",
        showTodayButton: true,
       // minDate: "moment",
        toolbarPlacement: "bottom",
        icons: {
          next: "fa fa-chevron-right",
          previous: "fa fa-chevron-left",
          today: 'texttoday',
        }
    });

	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
	reader.onload = function(e) {
	$('.imagePreview').css('background-image', 'url('+e.target.result+')');
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imageUpload").change(function() {
  readURL(this);
});
});
</script>
