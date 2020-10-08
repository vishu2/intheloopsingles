<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Attendee List for <?= $travels->travel_name; ?>
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block add-user" href="#">Register Member</a>
		</div>
	</div>
</div>
<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Attendees: <?= $registered; ?> / <?php if(!empty($travels->quantity)) {echo $travels->quantity; } else { echo "∞"; } ?>
			</h2>
		</div>   
		<div class="col-auto ml-md-5 d-print-none">        
			Total Collected: $<?= $amount_collected; ?> <br>
			Total refunded: $<?= $refund; ?> <br>
			Total Cost: $<?= $travels->travel_cost; ?> 
		</div>
	</div>
</div>
<div class="loader" style="display:none;">
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#0000;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<g transform="translate(20 50)">
<circle cx="0" cy="0" r="6" fill="#e15b64" transform="scale(0.17454 0.17454)">
  <animateTransform attributeName="transform" type="scale" begin="-0.375s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform>
</circle>
</g><g transform="translate(40 50)">
<circle cx="0" cy="0" r="6" fill="#f8b26a" transform="scale(0.000168956 0.000168956)">
  <animateTransform attributeName="transform" type="scale" begin="-0.25s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform>
</circle>
</g><g transform="translate(60 50)">
<circle cx="0" cy="0" r="6" fill="#abbd81" transform="scale(0.159133 0.159133)">
  <animateTransform attributeName="transform" type="scale" begin="-0.125s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform>
</circle>
</g><g transform="translate(80 50)">
<circle cx="0" cy="0" r="6" fill="#81a3bd" transform="scale(0.490303 0.490303)">
  <animateTransform attributeName="transform" type="scale" begin="0s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform>
</circle>
</g>
</svg>
</div>
<div class="box">
	<div class="card" style="height:460px;overflow:scroll;">
		<div class="table-responsive">
			<table class="table table-vcenter card-table">
				<thead>
					<tr>
						<th scope="col">Sr. Num</th>
						<th scope="col">
							<?= $this->Paginator->sort('Full Name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Email') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Age') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Mobile') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Amount Paid') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Complimentary') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Cancel Member') ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if($travels->travel_registrations==null) { ?>
					<td colspan="9" style="text-align:center;"> No Event Attendee yet. </td>
					<?php } else { ?>
					<?php $i=1; foreach ($travels->travel_registrations as $travel_user): ?>
					<!--<input type="hidden" value="<?= $travel_user->id; ?>" name="id">
					<input type="hidden" value="<?= $travel_user->user_id; ?>" name="user_id">
					<input type="hidden" value="<?= $travel_user->travel_id; ?>" name="travel_id">
					<input type="hidden" value="<?= $travel_user->amount_paid; ?>" name="amount_paid">
					<input type="hidden" value="1" name="is_cancelled">-->
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td <?php if (($travel_user->user->user_profile->sex)=='1') {  } else { echo 'style="color:#ff00ff"';  } ?>>
							<?= $travel_user->user->user_profile->first_name.' '.$travel_user->user->user_profile->last_name ?>
						</td>
						<td>
							<?= $travel_user->user->email ?>
						</td>
						<td>
							<?php 
								$dob = $travel_user->user->user_profile->dob;
								$today = date("Y-m-d");
								$diff = date_diff(date_create($dob), date_create($today));
								echo $diff->format('%y');
							?>
						</td>
						<td>
							<?= $travel_user->user->user_profile->mobile ?>
						</td>
						<td>
							$<?= $travel_user->amount_paid ?>
						</td>
						<td>
							<?php if($travel_user->comp==0) { echo "No"; } else { echo "Yes"; } ?>
						</td>
						<?php if($travel_user->is_cancelled == 1) { ?> 
						<td><?php if($travel_user->cancellation_status == 1) { echo "Cancelled by " . $travel_user->users_staff->email .  " on " . date('d M, Y', strtotime($travel_user->cancelled_date)); } else if($travel_user->cancellation_status == 2) { echo "Cancelled & refunded by " . $travel_user->users_staff->email .  " on " . date('d M, Y', strtotime($travel_user->cancelled_date)); } else { echo ""; } ?> </td>
						<?php } else { ?>
						<td>
							<!--<input type="submit" onclick="return confirm('Are you sure?')" value="Cancel without refund" name="submit" class="btn btn-danger m-0 py-1">
							<input type="submit" onclick="return confirm('Are you sure?')" value="Cancel with refund" name="submit" class="btn btn-danger m-0 py-1">-->
							
							<?= $this->Form->postLink('<span class="delete_btn">Cancel without refund</span><span class="sr-only">' . __('edit') . '</span>',['action' => 'cancelEvent', base64_encode($travel_user->id), base64_encode($travel_user->user_id) ,base64_encode($travel_user->travel_id)],['escape' => false ,'class' => __('cancel_without_refund')]) ?>
							
							<?= $this->Form->postLink('<span class="delete_btn">Cancel with refund</span><span class="sr-only">' . __('edit') . '</span>',['action' => 'cancelEventrefund', base64_encode($travel_user->id), base64_encode($travel_user->user_id),base64_encode($travel_user->travel_id) ],['escape' => false ,'class' => __('cancel_with_refund')]) ?>
						</td>
						<?php } ?>
					</tr>
					<?php $i++; endforeach; ?>
					<?php } ?> 
				</tbody>
			</table>
		</div>
	</div>	
</div>
<!--Member event reg.-->
<div class="modal modal-blur fade" id="add-user" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Register Member</h5>
         </div>
         <?= $this->Form->Create(null, [ 'id'=>'registermember', 'url' => ['controller' => 'travels','action' => 'registerMember', 
         base64_encode($travels->id) ]]) ?>
         <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <?= $this->Form->Create(null, [ 'class'=>'card']) ?> 
					<div class="row">
						<div class="col-md-6 col-xl-6">
							<div class="mb-3">
								<label class="form-label">Please select your room/price preference:</label>
								<select id="cost" name="cost" class="form-control">
										
										<option data-type="1" value="<?= $travels->cost_single; ?>"> Single Occupancy pay in full- $<?= $travels->cost_single; ?></option>
										<option data-type="2" value="<?= $travels->cost_shared; ?>"> Shared Occupancy pay in full- $<?= $travels->cost_shared; ?></option>
										<option data-type="3" value="<?= $travels->deposit_single; ?>"> Single Occupancy Deposit- $<?= $travels->deposit_single; ?></option>
										<option data-type="4" value="<?= $travels->deposit_shared; ?>"> Shared Occupancy Deposit- $<?= $travels->deposit_shared; ?></option>
								</select>
							</div>
						</div>
						<input type="hidden" id="payment_type" name="payment_type">
						<div class="col-md-6 col-lg-6 col-xl-6">
							<div class="mb-3">
							   <label class="form-label">Select Member</label>                          
								<select class="form-control" id="member" name="user_id" data-placeholder="Select Member...">
									
								</select>
							</div>
						</div>
						<div class="col-md-8 col-lg-8 col-xl-8">
							<div class="mb-3">
							   <label class="form-label">Payment Mode</label>
								<input type="radio" value="complimentary" name="mode" checked> Complimentary &nbsp;&nbsp;
								<input type="radio" value="credit" name="mode"> Credit Wallet &nbsp;&nbsp;
								<input type="radio" value="card" name="mode"> Card Payment
							</div>
						</div>
					</div>
					<div id="complimentary" style="display: none">
					</div>
					<div id="card" style="display: none">
						<input type="hidden" name="payment" id="payment_id">
						<div class="col-sm-12 row">									
							<div id="card-element"  class="form-control pt-2 mb-3 mr-md-3 rounded-0"></div>
							<div id="payment-result"></div>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-xl-6" id="credit" style="display: none">
					</div>
					<div class="row d-flex">
                       <div class="d-flex">
                         <button type="submit" name="lead_id"  class="btn btn-primary">Save</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>
                     </div>
					<?= $this->Form->end(); ?>
             </div>
            </div>
         </div>
         <?= $this->Form->end(); ?>
      </div>
   </div>
</div>
<!--Member event reg. end-->
<div class="card col-12" id="" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="" role="document">
      <div class="">
			<div class="modal-header">
				<h5 class="modal-title">Send Email/SMS</h5>
			</div> 
			<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
			<?php $this->TinymceElfinder->defineElfinderBrowser()?>							 
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
							<ul class="nav nav-tabs nav-fill" data-toggle="tabs">
								<li class="nav-item">
									<a href="#tab-sms" class="nav-link active" data-toggle="tab">
										1. SMS Template
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-email" class="nav-link" data-toggle="tab">
										2. Email Template
									</a>
								</li>								
							</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-sms">
									<?= $this->Form->Create(null, ['class' => 'card-body', 'url' => [
									'controller' => 'Travels',
									'action' => 'send_sms', $travels->id
								]]) ?>	
									<div class=" mt-4">
										<div class="col-xl-12">				
												<div class="mb-3">
												<label class="form-label">Enter SMS Content</label>
												<?= $this->Form->control('template_body', ['label' => false,'type'=>'textarea', 'class'=> 'form-control', 'placeholder' => 'Enter Content','required'=> true]) ?>
												</div>				
										</div>						   
									</div>
									<div class="d-flex">
										<button type="submit" class="btn btn-primary ">Save</button>
										<button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
									</div>
									 <?= $this->Form->end(); ?>
							</div>
							<div class="tab-pane" id="tab-email">
								<?= $this->Form->Create(null, ['class' => 'card-body', 'url' => [
									'controller' => 'Travels',
									'action' => 'send_email', $travels->id
								]]) ?>
								<div class="row mt-4">
									<div class="col-xl-6">				
											<div class="mb-3">
											<label class="form-label">Enter Subject</label>
											<?= $this->Form->control('subject', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Subject','required'=> true]) ?>
											</div>				
									</div>
									<div class="col-xl-12">				
											<div class="mb-3">
											<label class="form-label">Email Template Body</label>
											<?= $this->Form->control('template_body', ['label' => false,'type'=>'textarea', 'class'=> 'form-control', 'placeholder' => 'Enter Template Body','required'=> true]) ?>
											</div>				
									</div>						   
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                        <button type="submit" class="btn btn-primary">Save</button>
									<button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
			                      </div>
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
<script src="https://js.stripe.com/v3/"></script>
<script type='text/javascript'>
$(document).ready(function(){
$('input:radio[name="mode"]').change(function(){
    if($(this).val() == 'complimentary'){
      $("#complimentary").show();
	  $("#credit").hide();
	  $("#card").hide();
    }
	else if($(this).val() == 'credit') {
       $("#credit").show();
	   $("#complimentary").hide();
	   $("#card").hide();
    }
	else {
		$("#credit").hide();
	    $("#complimentary").hide();
	    $("#card").show();
		
		
			var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
			//var stripe = Stripe('<?=  \Cake\Core\Configure::read('seattle_publickey'); ?>');  
			var elements = stripe.elements();
			var cardElement = elements.create('card');
			cardElement.mount('#card-element');

			var form = document.getElementById('registermember');

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
				resultContainer.innerHTML = "<p style='color:red;'>"+ result.error.message +"</p>";
			  } else {
				$("#payment_id").val(result.paymentMethod.id);
				form.submit();

			  }
			}
	}
});
});
</script>
<script>
    $(function() {    
    $('.cancel_with_refund').attr('onClick', '').unbind('click');
	$('.cancel_without_refund').attr('onClick', '').unbind('click');
	$(document).on('click', '.cancel_with_refund', function(event){
		var form = $(this).prev('form');	
      swal({
             title: "Are you sure?",
             text: "Cancel event with Refund",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
          .then((willDelete) => {
          	if(willDelete){

          		form.submit();
          	}              
        });
			
    }); 
    $(document).on('click', '.cancel_without_refund', function(event){
		var form = $(this).prev('form');
      swal({
             title: "Are you sure?",
             text: "Cancel event without Refund",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
          .then((willDelete) => {
          	if(willDelete){

          		form.submit();
          	}              
        });
			
    }); 	
});
</script>
<script>
    $(function() {
	$(document).on('click', '.add-user', function(){
		$(".loader").css('display', 'block');		
		$(document).find("#member").find('option').remove();
		$.ajax({
            type: "POST", 
            url: '<?php echo $this->Url->build(["controller" => "travels", "action" => "show-member", $travels->id ]) ?>', 
            success: function(response){
				
				response = JSON.parse(response); 
				var html = '';
				$.each(response.userData, function(i,data){
					html += '<option selected="selected"></option><option value="'+data.id+'">'+data.user_profile.first_name+' '+data.user_profile.last_name+' -'+data.user_profile.mobile+'</option>';
					
				});
				$("#member").append(html);
				$('#member').selectize();
				$(".loader").css('display', 'none');
				$("#add-user").modal('show');
			},
			error: function(response){
				alert('Error!!');
			}
		});
		;
    }); 	
});
</script>
<script type="text/javascript">
$(document).ready(function() {
   $("#cost").on("change",function() {	
	 document.getElementById('payment_type').value = $('option:selected',this).data("type");	
    }); 
});
</script>
<style>
.loader {
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #9ca2b740;
  webkit-backdrop-filter: blur(2px);
    backdrop-filter: blur(2px);
  z-index: 99;
  text-align: center;
}
.loader:after{border: 0;}
.loader svg{margin-top: 20% !important;}
.loader img {
  position: absolute;
 top: 40%;
 left: 50%;
  bottom: 0;
  right: 0;
  z-index: 999;
}
.loader {
	/*margin: 0 auto;
	backdrop-filter: blur(2px);*/
  /*border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-bottom: 16px solid blue;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;*/
}

/*@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}*/
</style>