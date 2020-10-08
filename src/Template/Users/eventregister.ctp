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
			console.log($("#TotalValue").val());
			console.log($("#balance").attr('data-bal'));
		if($("#TotalValue").val() > $("#balance").attr('data-bal')){
			$("#card-element").css('display', 'block');
		}       
    }
</script>
<section class="event_sec gallery_sec">
	<div class="container">
		<div class="row col-lg-8 mx-auto">
			<?= $this->Flash->render(); ?>
							<?= $this->Form->create(null, ['url' => [
							'controller' => 'EventRegistrations',
							'action' => 'add'
						], 'id'=>'register-event'])?>	
						
				<div class="col-sm-12">
					<div class="row">
						<h4 class="text-dark mx-auto Credit_ " id="balance" data-bal="<?= $user->user_profile->credit_balance ?>">Event Credit Balance- <?= $user->user_profile->credit_balance ?></h4>						
						<div class="form-group col-md-12">							
						  <label for="input">Quantity *</label>	
						  <input type="number" name="quantity" min="1" id="quantity" onchange="Multiply()">
							<input type="hidden" id="txtBox" value="<?= $events->event_fee ?>">	
							<input type="hidden" name="user_id" value="<?= $user->id ?>">
							<input type="hidden" name="event_id" value="<?= $events->id ?>">
							<input type="hidden" name="status" value="1">						
							<input type="hidden" name="payment" id="payment_id">						
						</div>											
					</div>				 					
				</div>			
				<div class="col-md-12 col-lg-12">
					<div class="">
						<div class="event_padd pl-0">						
								<h4>Event Name:<span> <?= $events->event_name ?></span></h4>
								<h4>Event Fee: <span><?= $events->event_fee ?></span></h4>
								<h4>Tickets Total: <input readonly type="text" id="TotalValue"> </h4>							
						</div>									
						<div id="card-element" style="display: none;"></div>
						<div id="payment-result"></div>
					</div>
				</div>
				 <button type="submit" class="btn bg-success btn-success">Submit</button>				
				<?= $this->Form->end(); ?>						
		</div>
	</div>
</section>
<script src="https://js.stripe.com/v3/"></script>
<script>
$(function() {

	var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
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
	  	/*var amount = 0;
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
	    }).then(handleServerResponse);*/
	  }
	}

	
	});
</script>
