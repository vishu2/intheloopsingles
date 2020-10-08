<div class="container-fluid">
	<div class="row row-deck row-cards">
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-icon-dashboard">
					      <i class="fa fa-user text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Name</p>				
								<h2><?= $user->user_profile->first_name .' '. $user->user_profile->last_name; ?> </h2>              
							</div> 
					      </div>
					  </div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-email-dashboard">
					      <i class="fa fa-envelope text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Email</p>				
								<h2><?= h($user->email) ?>    </h2>              
							</div> 
					      </div>
					  </div>
					</div>					
				</div>				
			</div>
		</div>
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-phone-dashboard">
					      <i class="fa fa-credit-card text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Account Credit</p>				
								<h2><?= h($user->user_profile->credit_balance); ?> </h2>              
							</div> 
					      </div>
					  </div>
					</div>					
				</div>				
			</div>
		</div>
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-Cell-dashboard">
					      <i class="fa fa-money text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Membership Amount</p>				
								<h2>$10  </h2>              
							</div> 
					      </div>
					  </div>
					</div>					
				</div>			
			</div>
		</div>
	</div>
</div>
<div class="" id="" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="" role="document">
      <div class="card">
			<div class="card-header">
				<h5 class="card-title">Member Details</h5>				
			</div>       					 
			<div class="card-body">
				<div class="row">
					<div class="col-12" id="massSms">
							<ul class="nav nav-tabs" data-toggle="tabs">
								<li class="nav-item">
									<a href="#detail" class="nav-link active show" data-toggle="tab">
										1. Member Details
									</a>
								</li>
								<li class="nav-item">
									<a href="#notes" class="nav-link" data-toggle="tab">
										2. Add Notes
									</a>
								</li>
								<li class="nav-item">
									<a href="#credit" class="nav-link" data-toggle="tab">
										3. Add Credit 
									</a>
								</li>
								<li class="nav-item">
									<a href="#membership" class="nav-link" data-toggle="tab">
										4. Membership Plan
									</a>
								</li>
								<li class="nav-item">
									<a href="#events" class="nav-link" data-toggle="tab">
										5. Event Attended
									</a>
								</li>
								<li class="nav-item">
									<a href="#reset-password" class="nav-link" data-toggle="tab">
										6. Reset Password
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane card active show" id="detail">		
								<div class="row col-md-11  pl-md-4 user-details">
									<div class="col-md-12 py-4"><?= $this->Html->image((!empty($user->user_profile->profile_image) ? '/files/member-profile/'.$user->user_profile->profile_image : 'default-user.png'), ['fullBase' => true, 'height'=>'70px',  'width'=>'70px','class'=>'rounded-circle'])?><span class="h1 pt-4 pl-3"><?= $user->user_profile->first_name .' '. $user->user_profile->last_name; ?></span></div>
										<div class="col-md-3 user-title">Membership Expiry :</div>
										<div class="col-md-7 ">
											<?php if (!empty($user->user_profile->membership)) { echo date('d M, Y', strtotime($user->user_profile->membership)); } ?>
										</div>
										<div class="col-md-3 user-title">Phone :</div>
										<div class="col-md-7 "><?= h($user->user_profile->phone); ?></div>
										<div class="col-md-3 user-title">Mobile :</div>
										<div class="col-md-7 "><?= h($user->user_profile->mobile); ?></div>
										<div class="col-md-3 user-title">Date of Birth : </div>
										<div class="col-md-7 "><?= h($user->user_profile->dob); ?></div>
										<div class="col-md-3 user-title">Sex  :</div>
										<div class="col-md-7 ">
											<?php if(($user->user_profile->sex)=='1') { echo "Male"; } 
											else if (($user->user_profile->sex)=='2') { echo "Female"; }  
											else { } ?>
										</div>
										<div class="col-md-3 user-title">Address  : </div>
										<div class="col-md-7 "><?= h($user->user_profile->address); ?></div>
										<div class="col-md-3 user-title">City :</div>
										<div class="col-md-7 ">  <?= h($user->user_profile->city); ?></div>
										<div class="col-md-3 user-title">State : </div>
										<div class="col-md-7 "> <?= $user->user_profile->has('state') ? $this->Html->link($user->user_profile->state->state_name, []) : '' ?></div>
										<div class="col-md-3 user-title">Zip : </div>
										<div class="col-md-7 "> <?= h($user->user_profile->zip); ?></div>
								</div>
							</div>
							<div class="tab-pane" id="notes">
								<div class="row">
									<div class="card col-lg-7"> <!--  mx-auto -->
										<div  id="" class="pb-5">
											<?= $this->Form->Create(null, [ 'id'=>'addnotes','url' => [
												'controller' => 'MemberNotes',
												'action' => 'add'
											]]) ?>
											<div class="py-3 col-12 ">
												<h3 class="card-header">Add Notes</h3>
											</div>
											<input type="hidden" name="user_id" value="<?= h($user->id)  ?>">
											<div class="form-group">
												<div class="col-lg-12 text-center mb-3 mt-2">
													<?= $this->Form->control('notes', ['label' => false, 'class'=> 'form-control', 'type' => 'textarea', 'required' => true]) ?>
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
									<div class="card col-lg-5"> <!--  mx-auto -->
										<div  id="" class="pb-5">
											<div class="py-3 col-12 ">
												<h3 class="card-header">Notes</h3>
											</div>
											<div class="form-group row ">
												<div class="col-lg-12 text-center mb-3 mt-2">	
													<?php foreach ($memberNotes as $memberNote): ?>
														<div class="notes_msg"><?= $memberNote->notes ?>
														<span>By <?=  $memberNote->users_staff->email ?> on <?= date('d M, Y', strtotime($memberNote->created)); ?>, <?= date('h:i A', strtotime($memberNote->created)); ?></span>
														</div>
													<?php endforeach; ?>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="tab-pane" id="credit">
								<div class="row mt-4">
									<div class="col-md-12">	
										<?= $this->Form->Create(null, [ 'id'=>'addcredit', 'url' => [
											'controller' => 'Users',
											'action' => 'addmembercredit', base64_encode($userid)
										]]) ?>
										<div class="col-md-12 col-xl-12">
											<div class="row">
											<input type="hidden" name="userid" value="<?php echo $userid; ?>">
												<div class="col-md-4 col-xl-4">
													<div class="mb-3">
														<label class="form-label">Amount </label>
														<?= $this->Form->control('amount_paid', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Amount']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Remarks </label>
														<?= $this->Form->control('remarks', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Remarks']) ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Save</button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>										  
										<?= $this->Form->end(); ?> 
									</div>
									<div class="table-responsive ">
										<table class="table table-vcenter card-table" id="user-add-Board">
											<thead>
												<tr>
													<th scope="col">Sr. Num</th>
													<th scope="col">
														<?= $this->Paginator->sort('Amount') ?>
													</th>
													<th scope="col">
														<?= $this->Paginator->sort('Remarks') ?>
													</th>
													<th scope="col">
														<?= $this->Paginator->sort('Type') ?>
													</th>
													<th scope="col">
														<?= $this->Paginator->sort('On') ?>
													</th>
												</tr>
											</thead>
											<tbody>										  
												<?php $i=1; foreach ($transactions as $transaction): ?>
												<tr>
													<td><?= $i ?></td>
													<td>$<?= h($transaction->amount_paid) ?></td>
													<td><?= h($transaction->remarks) ?></td>
													<td>
													<?php if ($transaction->payment_type == 1) { echo "credit added by admin"; } else if ($transaction->payment_type == 2)  { echo "credit added by user"; } else if ($transaction->payment_type == 3)  { echo "payment by admin"; } else if ($transaction->payment_type == 4)  { echo "payment by user"; } else { echo ""; } ?>
													</td>
													<td><?= date('d M, Y', strtotime($transaction->transaction_date)) ?></td>
												</tr>
												<?php $i++; endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="membership">
								<div class="row mt-4">
									<div class="col-md-12">	
										<?= $this->Form->Create(null, [ 'id'=>'addmembership']) ?>
										<div class="col-md-12 col-xl-12">
											<div class="row">
											<input type="hidden" name="userid" value="<?php echo $userid; ?>">
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Membership Price </label>
														<?= $this->Form->control('membership_price', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Membership Price']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Down Payment </label>
														<?= $this->Form->control('down_payment', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Down Payment']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Monthly Payment </label>
														<?= $this->Form->control('monthly_payment', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Monthly Payment']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label"># of Payments </label>
														<?= $this->Form->control('no_of_payments', ['label' => false, 'class'=> 'form-control', 'placeholder' => '# of Payments']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Monthly Fee </label>
														<?= $this->Form->control('monthly_fee', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Monthly Fee']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Payment Start Date </label>
														<div class="input-group date" id="p_start_date">
											                <input class="form-control ignore" name="payment_start_date"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
											            </div>
													</div>
												</div>

												<input type="hidden" name="payment" id="payment_id">
												<div class="col-sm-8 row">									
													<div id="card-element"  class="form-control pt-2 mb-3 mr-md-3 rounded-0"></div>
													<div id="payment-result"></div>
												</div>

											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Save</button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>										  
										<?= $this->Form->end(); ?> 
									</div>
								</div>
							</div>
							<div class="tab-pane card" id="events">
								<div class="table-responsive">
									<table class="table table-vcenter card-table" id="user-add-Board">
										<thead>
											<tr>
												<th scope="col">Sr. Num</th>
												<th scope="col">
													<?= $this->Paginator->sort('Reg. Date') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Event') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Amount Paid') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Cancelled') ?>
												</th>
											</tr>
										</thead>
										<tbody>										  
											<?php if($eventRegistrations->isEmpty()) { ?>
											<tr><td colspan="4" style="text-align: center;">No Events Attended</td></tr>
											<?php  } else  {  ?>
											<?php $i=1; foreach ($eventRegistrations as $eventRegistration): ?>
											<tr>
												<td><?= $i ?></td>
												<td><?= date('d M, Y', strtotime($eventRegistration->created)) ?></td>
												<td><?= h($eventRegistration->event->event_name) ?></td>
												<td>$<?= h($eventRegistration->event->event_fee) ?></td>
												<td><?php if($eventRegistration->is_cancelled==0) { echo "No"; } else { echo "<span style='color:red;'>Yes</span>"; } ?></td>
											</tr>
											<?php $i++; endforeach; ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<hr>
								<div class="table-responsive">
									<table class="table table-vcenter card-table" id="user-add-Board">
										<thead>
											<tr>
												<th scope="col">Sr. Num</th>
												<th scope="col">
													<?= $this->Paginator->sort('Reg. Date') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Travel Event') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Amount Paid') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Cancelled') ?>
												</th>
											</tr>
										</thead>
										<tbody>										  
											<?php if($travelRegistrations->isEmpty()) { ?>
											<tr><td colspan="4" style="text-align: center;">No Travel event Attended</td></tr>
											<?php  } else  {  ?>
											<?php $i=1; foreach ($travelRegistrations as $travelRegistration): ?>
											<tr>
												<td><?= $i ?></td>
												<td><?= date('d M, Y', strtotime($travelRegistration->created)) ?></td>
												<td><?= h($travelRegistration->travel->travel_name) ?></td>
												<td>$<?= h($travelRegistration->amount_paid) ?></td>
												<td><?php if($travelRegistration->is_cancelled==0) { echo "No"; } else { echo "<span style='color:red;'>Yes</span>"; } ?></td>
											</tr>
											<?php $i++; endforeach; ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="reset-password">
								<div class="row mt-4">
									<div class="col-md-12">	
										<?= $this->Form->Create(null, [ 'id'=>'resetpassword', 'url' => [
											'controller' => 'Users',
											'action' => 'memberresetpassword', base64_encode($userid)
										]]) ?>
										<div class="col-md-12 col-xl-12">
											<div class="row">
											<input type="hidden" name="userid" value="<?php echo $userid; ?>">
												<div class="col-md-4 col-xl-4">
													<div class="mb-3">
														<label class="form-label">New Password </label>
														<?= $this->Form->control('password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'New Password','id'=>'password']) ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Save</button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>										  
										<?= $this->Form->end(); ?> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>         
		</div>
	</div>
</div>
</div>
	<script src="https://js.stripe.com/v3/"></script>
	<script type='text/javascript'>

		$(document).ready(function(){
					
			var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
			//var stripe = Stripe('<?=  \Cake\Core\Configure::read('denver_publickey'); ?>');  
			var elements = stripe.elements();
			var cardElement = elements.create('card');
			cardElement.mount('#card-element');

			var form = document.getElementById('addmembership');

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
				$("#payment_id").val(result.paymentMethod.id);
				form.submit();

			  }
			}
	});
	</script>
 	<script>
		$(document).ready(function() {
		$("#addcredit").validate( {
		rules: {					
			amount_paid: {
				required:true,
				number:true
			},
			remarks: {
				required:true
			}
		},
		messages:{		
			amount_paid: {
				required: "Please Enter Amount",
				number:"Please Enter Valid Amount"
			},
			remarks: {
				required: "Please Enter Remarks"
			}
		}		
		});
		$("#addmembership").validate( {
		rules: {					
			membership_price: {
				required:true
			},
			down_payment: {
				required:true
			},
			monthly_payment: {
				required:true
			},
			no_of_payments: {
				required:true
			},
			monthly_fee: {
				required:true
			},
			payment_start_date: {
				required:true
			}
		},
		messages:{		
			membership_price: {
				required: "Please Enter Membership Price"
			},
			down_payment: {
				required: "Please Enter Down payment Amount"
			},
			monthly_payment: {
				required: "Please Enter Monthly Payment"
			},
			no_of_payments: {
				required: "Please Enter no. of Payments"
			},
			monthly_fee: {
				required: "Please Enter Monthly Fee"
			},
			payment_start_date: {
				required: "Please Enter Payment Start Date"
			}
		}		
		});
		});
	</script>
	<script>
		$(document).ready(function() {
		$("#resetpassword").validate( {
		rules: {					
			password: {
				required:true,
				password:true,
				minlength: 6
			}
		},
		messages:{		
			password: {
				required: "Please Enter Password",
				minlength:"Please enter atleast 6 characters"
			}
		}		
		});
		});		
	</script>
	
	<script>
		$(document).ready(function() { 
		$("#addnotes").validate( {
		rules: {					
			notes: {
				required:true
			}
		},
		messages:{		
			notes: {
				required: "Please Enter Notes"
			}
		}		
		});
		});
	</script>
	<style >
		.notes_msg{
			position: relative;
    padding: 20px;
    text-align: left;
    background: #f8f7ff;
    margin: 10px 0;
		}
		.notes_msg span{
	position: absolute;
    bottom: 4px;
    right: 20px;
    font-size: 12px;
	color: #3d017d;}
	</style>