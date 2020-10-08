<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Travels</h3>
		</div>
	</div>
</section>
<script>
 // function Multiply() {       
        // var selectBox_Value = $("#Select").val();        		
		// $("#TotalValue").val(selectBox_Value);        
    // }
	
	$(document).ready(function() {
	   $("#Select").on("change",function() {	
		 document.getElementById('payment_type').value = $('option:selected',this).data("type");
		 document.getElementById('TotalValue').value = $("#Select").val();
		}); 
	});
 </script>
<section class="detail_sec">
	<div class="container">
		<!--<div class="detail_bg" style="background: url(<?= ('../../files/travel-photo/'.$travels->featured_image); ?>) no-repeat center/cover;">
			<div class="overlay-travel"></div>
			<div class="position-relative">
				<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'travel'])?>" class="back_click"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
				<div class="detail_head">
					<h2><?= $travels->travel_name ?></h2>
					<p><?= date('M d, Y', strtotime($travels->depart_date)) ?> to <?= date('M d, Y', strtotime($travels->return_date)) ?></p>
					<p><span><?= $travels->travel_location ?></span></p>
					<p><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>View Map</a></p>
				</div>
			</div>
		</div>-->
		<div class="row">
			<div class="col-md-12">
				<img src="<?= ('../../files/travel-photo/'.$travels->featured_image); ?>">
			</div>
		</div>
		<div class="event_detail">
			<div class="row">
				<div class="col-lg-9">
					<h4>Description</h4>
					<h3><?= $travels->travel_name ?></h3>
					<p><?= date('M d, Y', strtotime($travels->depart_date)) ?> to <?= date('M d, Y', strtotime($travels->return_date)) ?></p>
					<p><label>Location: </label> <span><?= $travels->travel_location ?></span></p>
					<p><label>Event Cost: </label> Single occupancy: $<?= $travels->cost_single ?> Shared Occupancy: $<?= $travels->cost_shared ?></p>
					<?php if(!empty($travels->deposit_single)) { ?><p><label>Single Occupancy Deposit: </label> $<?= $travels->deposit_single ?> Payment in full due by <?= date('M d, Y', strtotime($travels->pay_due)) ?></p> <?php } ?>
					<?php if(!empty($travels->deposit_shared)) { ?><p><label>Shared Occupancy Deposit: </label> $<?= $travels->deposit_single ?> Payment in full due by <?= date('M d, Y', strtotime($travels->pay_due)) ?></p> <?php } ?>
					<p><?= $travels->description ?></p>
					<h4>Included</h4>
					<p><?= $travels->included ?></p>
					<h4>Excluded</h4>
					<p><?= $travels->excluded ?></p>
					<h4>Notes</h4>
					<p><?= $travels->notes ?></p>
					<h4>Summary</h4>
					<p><?= $travels->summary ?></p>
					
				</div>
				<div class="col-lg-3">
					<h4>Travel Location</h4>
					<div class="map_box">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6317849847!2d144.49269473369353!3d-37.97123702210555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sin!4v1594290383561!5m2!1sen!2sin" width="100%" height="180" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
					<h4><?= $travels->travel_location ?></h4>
					
				</div>
			</div>			
		</div>
		<!--<a class="btn" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'travelregister',
			$travels->id])?>">Next</a>-->
	</div>
</section>
<?php  if (!empty($travels->travel_registrations)) { ?> 
 <section class="detail_sec">
	<div class="container"> 
		<p> Already Registered</p>
	</div>
</section> 
<?php } else if((strtotime(date('Y-m-d')) >= strtotime($travels->depart_date))||($registered>=$travels->quantity)) { ?>
<section class="detail_sec">
	<div class="container"> 
		<p> Registration is closed, please call the office to sign up! </p>	
	</div>
</section>
<?php } else { ?>
<section class="event_sec gallery_sec">
	<div class="container">
		<div class="row col-lg-8 mx-auto">
			<?= $this->Flash->render(); ?>
					<?= $this->Form->create(null, ['id'=>'travelreg', 'url' => [
							'controller' => 'TravelRegistrations',
							'action' => 'add'
						]])?>
				<div class="col-sm-12">
					<div class="row">
						<div class="form-group col-md-12">							
						  <label for="input">Please select your room/price preference:</label>					  
							<select class="form-control" onchange="Multiply()" id="Select" name="cost">
								<option> Select your Preference </option>
								<!--<option value="<?= $travels->cost_single ?>"> Single Occupancy- $<?= $travels->cost_single ?> </option>
								<option value="<?= $travels->cost_shared ?>"> Shared Occupancy- $<?= $travels->cost_shared ?> </option>-->
								<option data-type="1" value="<?= $travels->cost_single; ?>"> Single Occupancy pay in full- $<?= $travels->cost_single; ?></option>
								<option data-type="2" value="<?= $travels->cost_shared; ?>"> Shared Occupancy pay in full- $<?= $travels->cost_shared; ?></option>
								<option data-type="3" value="<?= $travels->deposit_single; ?>"> Single Occupancy Deposit- $<?= $travels->deposit_single; ?></option>
								<option data-type="4" value="<?= $travels->deposit_shared; ?>"> Shared Occupancy Deposit- $<?= $travels->deposit_shared; ?></option>
							</select>
						</div>					
					</div>				 
				</div>					
				<input type="hidden" name="user_id" value="<?= $user->id ?>">
				<input type="hidden" name="travel_id" value="<?= $travels->id ?>">
				<!--<input type="hidden" name="single" value="<?= $travels->cost_single ?>">
				<input type="hidden" name="shared" value="<?= $travels->cost_shared ?>">
				<input type="hidden" name="deposit_paid" value="<?= $travels->deposit ?>">-->
				<input type="hidden" name="payment" id="payment_travelid">
				<input type="hidden" name="creditbalance" id="creditbalance" value="<?= $user->user_profile->credit_balance ?>">
				<input type="hidden" id="payment_type" name="payment_type">
			<div class="col-md-12 col-lg-12">
				<div class="">
					<div class="event_padd pl-0">																			
							<h4><input name="amount_paid" type="hidden" id="TotalValue"></h4> 											
					</div>					
				</div>
			</div>
			<div class="col-sm-12 row ">									
					<div id="card-element-travel"  class="form-control pt-2 mb-3 mr-md-3 rounded-0" style="display:none;"></div>
					<div id="payment-result-travel"></div>
			</div>
			<button type="submit" class="btn bg-success btn-success">Submit</button>
				<?= $this->Form->end(); ?>				
		</div>
	</div>
</section>
<?php } ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
$("#Select").on("change",function() {
		var userbalance   = $("#creditbalance").val();
		console.log('select: '+$("#Select").val());
		console.log('credit: '+$("#creditbalance").val());
		if (parseFloat($("#Select").val()) > parseFloat(userbalance))  		
		{	
			$("#card-element-travel").css('display', 'block');
			var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
			
			// <?php if($user->location_id == 1){ ?>	
			// 	var stripe = Stripe('<?= \Cake\Core\Configure::read('seattle_publickey'); ?>');  
			// <?php  } else if($user->location_id == 2){  ?>
			// 	var stripe = Stripe('<?= \Cake\Core\Configure::read('denver_publickey'); ?>');  
			// <?php } else {  ?>
			// 	var stripe = Stripe('<?= \Cake\Core\Configure::read('austin_publickey'); ?>');  
			// <?php } ?>

			var elements = stripe.elements();
			var cardElement = elements.create('card');
			cardElement.mount('#card-element-travel');

			var form = document.getElementById('travelreg');

			var resultContainer = document.getElementById('payment-result-travel');
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
				$("#payment_travelid").val(result.paymentMethod.id);
				form.submit();

			  }
			}
		}
		else { $("#card-element-travel").css('display', 'none'); }
	
});
</script>