<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Events</h3>
		</div>
	</div>
</section>
<script>
 function Multiply() {
        var txtbox_Value = $("#txtBox").val();
        var quantity_Value = $("#quantity").val();        
		var MultipliedValue = (txtbox_Value * quantity_Value);
		$("#TotalValue").val(MultipliedValue); 
		//console.log($("#TotalValue").val());
		//console.log($("#balance").attr('data-bal'));
		// if($("#TotalValue").val() > $("#balance").attr('data-bal')){
			// $("#card-element").css('display', 'block');
		// }
		var userbalance   = $("#balance").attr('data-bal');
		
		if (parseFloat($("#txtBox").val() * $("#quantity").val()) > parseFloat(userbalance)) 
		{
			$("#card-element").css('display', 'block');
		}
		else {
			$("#card-element").css('display', 'none');
		}
		
		
	}
</script>
<div class="text-center more_div">
<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal'])?>" class="btn">Back to Calender</a>
<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'event-listing'])?>" class="btn orange_btn">Back to List</a> 
</div>
<section class="detail_sec">
	<div class="container">
		<!--<div class="detail_bg" style="background: url(<?= ('../../files/event-photo/'.$events->event_photo); ?>)">
			<div class="overlay-travel"></div>
			<div class="position-relative">
				<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'event-listing'])?>" class="back_click"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Back</a>
				<div class="detail_head">
					<h2><?= $events->event_name ?></h2>
					<h5>Date & Time</h5>
					<p><?= date('M d, Y', strtotime($events->start_date)); ?> at <?= date('h:i A', strtotime($events->start_date)); ?></p>
					<p><span><?= $events->venue_name ?></span><span><?= $events->venue_address ?></span></p>
					<p><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>View Map</a></p>
				</div>
			</div>
		</div>-->
		<div class="row">
			<div class="col-md-12">
				<?php if (empty($events->event_photo)): ?>
				<?= $this->Html->image('no-image.png', [ 'height'=>'250px']); ?>
				<?php else: ?>
				<img src="<?= ('../../files/event-photo/'.$events->event_photo); ?>">
				<?php endif; ?>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-md-5">
				<img src="<?= ('../../files/event-photo/'.$events->event_photo); ?>">
			</div>
			<div class="col-md-7">				
				<h2><?= $events->event_name ?></h2>
				<h5>Date & Time</h5>
				<p><?= date('M d, Y', strtotime($events->start_date)); ?> at <?= date('h:i A', strtotime($events->start_date)); ?></p>
				<p><span><?= $events->venue_name ?></span><span><?= $events->venue_address ?></span></p>
				<p><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> View Map</a></p>			
			</div>
		</div>-->
		<div class="event_detail">
			<div class="row">
				<div class="col-lg-9">
					<h4>Description</h4>
					<h3><?= $events->event_name ?></h3>
					<h5>Date & Time</h5>
					<p><?= date('M d, Y', strtotime($events->start_date)); ?> at <?= date('h:i A', strtotime($events->start_date)); ?></p>
					<p><label>Location: </label><span><?= $events->venue_name ?></span></p>
					<p><label>Venue Address: </label><span><?= $events->venue_address ?></span></p>
					<p><label>Event Cost: $<?= $events->event_fee; ?></label>
					<?php if(!empty($events->event_fee_description)) { ?>(<?= $events->event_fee_description; ?>) <?php } ?></p>
					<p><label>Recommended Attire:</label><?= $events->attire_id ?></p>
					<p><label><b>Event Leader(s):</b></label>
					<?php foreach ($events->users as $users): ?>
					<?= $users->user_profile->first_name .' '. $users->user_profile->last_name .' - '. $users->user_profile->mobile ; ?> <br>
					 <?php endforeach; ?>
					</p>
					<?= $events->event_description; ?>
					<?php if (!empty($events->registration_close_date)) { ?>
					<h4>Registration Closes On: <?= date('M d, Y', strtotime($events->registration_close_date)); ?>
					</h4>
					<?php } ?>					
					<p style="color:#990000;font-style:italic;font-weight: bold;">
					<?php if(!empty($events->cancellation_date)) {   ?>
					Cancellation Policy: You must cancel your reservation by <?php echo date('M d, Y', strtotime($events->cancellation_date));  ?> to receive a credit refund on this event.  
					<?php } else { ?>
					There are no refunds for this event.
					<?php } ?>
					</p>
				</div>
				<div class="col-lg-3">
					<h4>Event Location</h4>
					<div class="map_box">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6317849847!2d144.49269473369353!3d-37.97123702210555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sin!4v1594290383561!5m2!1sen!2sin" width="100%" height="180" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
					<h4><?= $events->venue_name ?></h4>
					<p><?= $events->venue_address ?></p>
				</div>
			</div>			
		</div>				
		<?php  if(($events->registration_close_date)!='') { $a=$events->registration_close_date; } else { $a=$events->start_date; }     ?>

		<?php  if (!empty($events->event_registrations)) { ?>
		<p> Already Registered</p>
		<?php } else if((strtotime(date('Y-m-d')) > strtotime($a))||($totalCount>=$events->quantity)) { ?>
			<p> Registration is closed, please call the office to sign up! </p>
		<?php } else  { ?>
				<section class="event_sec  bg-white">
					<div class="container">
						<div class="row col-lg-8 mt-5 mr-auto eventDetails">
							<?= $this->Flash->render(); ?>
											<?= $this->Form->create(null, ['url' => [
											'controller' => 'EventRegistrations',
											'action' => 'add'
										], 'id'=>'register-event'])?>	
							<div class="row col-md-12 mr-auto event_reg">
								<div class="col-12">
									<div class="row">
										<h4 class="text-dark  mb-4 Credit_" id="balance" data-bal="<?= $user->user_profile->credit_balance ?>"></h4>						
										<div class="form-group row col-12 ">							
										  <label for="input" class="col-sm-3 pl-0 col-form-label"><h4>Quantity *</h4></label>	
										  <h4 class="col-sm-9 pl-md-1"> <input type="number" class="form-control rounded-0" name="quantity" min="1" id="quantity" onchange="Multiply()"></h4>
											<div class="input_fields_wrap col-md-12">		
											
											</div>
											<input type="hidden" id="txtBox" value="<?= $events->event_fee ?>">	
											<input type="hidden" name="user_id" value="<?= $user->id ?>">
											<input type="hidden" name="event_id" value="<?= $events->id ?>">
											<input type="hidden" name="status" value="1">
											<input type="hidden" name="payment" id="payment_id">											
										</div>											
									</div>				 					
								</div>		 	
								<div class="col-sm-12 row ">									
										<div id="card-element"  class="form-control pt-2 mb-3 mr-md-3 rounded-0" style="display:none;"></div>
										<div id="payment-result"></div>
								</div>
								<div class="form-group row col-12 event_padd pb-2 pl-0">							
										  <label for="input" class="col-sm-3 col-form-label"><h4>Total Cost:</h4></label>	
										  <h4 class="col-sm-9"><input readonly type="text" class="form-control bg-transparent rounded-0" name="TotalValue" id="TotalValue"> </h4>	
								</div>
								<button type="submit" class="btn bg-success btn-success">S u b m i t</button>
							</div>
						<?= $this->Form->end(); ?>	
						</div>
					</div>	
				</section>								
		<?php } ?> 
		
	</div>
</section>
<script src="https://js.stripe.com/v3/"></script>
<script>
$("#quantity").on("change",function() {
		var userbalance   = $("#balance").attr('data-bal');		
		if (parseFloat($("#txtBox").val() * $("#quantity").val()) > parseFloat(userbalance)) 		
		{	
		var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');	
		// <?php if($user->location_id == 1){ ?>	
		// 	var stripe = Stripe('<?= \Cake\Core\Configure::read('seattle_publickey'); ?>');  
		// <?php  } else if($user->location_id == 2){  ?>
		// 	var stripe = Stripe('<?= \Cake\Core\Configure::read('denver_publickey'); ?>');  
		// <?php } else {  ?>
		// 	var stripe = Stripe('<?= \Cake\Core\Configure::read('austin_publickey'); ?>');  
		// <?php } ?>

			console.log(stripe);
			var elements = stripe.elements();
			var cardElement = elements.create('card');
			cardElement.mount('#card-element');

			var form = document.getElementById('register-event');

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
		}
		else {}
	
});
</script>
<script>
	 $(document).ready(function() {
		var wrapper = $(".input_fields_wrap");
        var quantity = $("#quantity").val();
		
		$("#quantity").on("change",function(e){ 
		
			 var count = $("#quantity").val();
				 newContent = "";
			for (var i = 1; i < count; i++)
			{
				newContent +='<div class="row pb-2"> <input type="text" class="col-md-6" placeholder="Guest Name" name="event_registration_guests['+i+'][guest_name]" class = "form-control mb-3" required/><div class="col-md-4"><input class="" type="radio" name="event_registration_guests['+i+'][gender]" value="1" >Male <input  class="ml-3" type="radio" name="event_registration_guests['+i+'][gender]" value="2">Female </div></div>'; 
			}
			wrapper.html(newContent);
		});

		
	 });
</script>
<style>
	.ElementsApp{font-size: 16px;}
</style>