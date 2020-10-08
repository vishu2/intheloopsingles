<script>
 function Multiply() {
        var fee = $("#fee").val();
        var quantity = $("#quantity").val();        
		var total = (quantity * fee);
		$("#totalfee").val(total); 
		
		var userbalance   = $("#creditbalance").val();
		if (parseFloat(($("#fee").val() * $("#quantity").val())) > parseFloat(userbalance)) 
		{
			$("#card-element-event").css('display', 'block');
		}
		else {
			$("#card-element-event").css('display', 'none');
		}	
	}
	
</script>
<div class="" id="" tabindex="-1" role="dialog" aria-hidden="true">  
	<div class="" role="document">
      <div class="card ">
			<div class="card-header">
				<h5 class="card-title"></h5>
			</div>       
			<div class="card-body">
				<div class="row">
					<div class="col-12" id="massSms">
							<ul class="nav nav-tabs " data-toggle="tabs">
								<li class="nav-item">
									<a href="#tab-event" class="nav-link active" data-toggle="tab">
										1. Event Registration
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-travel" class="nav-link" data-toggle="tab">
										2. Travel Event Registration
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-credit" class="nav-link" data-toggle="tab">
										3. Add Credits
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-event">
								<div class="row mt-4">
									<?= $this->Form->Create(null, [ 'id'=>'eventreg', 'url' => [
										'controller' => 'Users',
										'action' => 'eventRegistration', base64_encode($userid)
									]]) ?>
									<input type="hidden" name="user_id" value="<?php echo $userid; ?>"> 
									<input type="hidden" name="status" value="1">
									<input type="hidden" name="fee" id="fee">
									<input type="hidden" name="payment" id="payment_id">
									<input type="hidden" name="creditbalance" id="creditbalance" value="<?= $user->user_profile->credit_balance ?>">
									<div class="col-md-12 row">	
										<div class="col-md-4 col-xl-4">
											<div class="mb-3">
												<label class="form-label">Select Event</label>
												<select id="event" class="form-control" name="event_id">
														<option>Select Event</option>
														<?php foreach ($events as $event): ?>
														<option value="<?= $event->id; ?>"  data-value="<?= $event->id; ?>"> <?= $event->event_name; ?></option>
														<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="col-md-4 col-xl-4">
											<div class="mb-3">
												<label class="form-label">Quantity</label>
												<input type="number" class="form-control rounded-0" name="quantity" min="1" value="1" id="quantity" onchange="Multiply()">
											</div>
										</div>
										<div class="col-md-4 col-xl-4">
											<div class="mb-3">
												<label class="form-label">Event fee</label>
												<input readonly type="text" class="form-control bg-transparent rounded-0" id="totalfee" name="totalfee">
											</div>
										</div>
										<div class="col-sm-12 row ">									
												<div id="card-element-event"  class="form-control pt-2 mb-3 mr-md-3 rounded-0" style="display:none;"></div>
												<div id="payment-result-event"></div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Save </button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>
									</div>
									<?= $this->Form->end(); ?>
								</div>
							</div>
							<div class="tab-pane" id="tab-travel">
								<div class="row mt-4">
									<?= $this->Form->Create(null, [ 'id'=>'travelreg', 'url' => [
										'controller' => 'Users',
										'action' => 'travelRegistration', base64_encode($userid)
									]]) ?>
									<input type="hidden" name="user_id" value="<?php echo $userid; ?>">
									<input type="hidden" name="single" id="single">
									<input type="hidden" name="shared" id="shared">
									<input type="hidden" name="payment" id="payment_travelid">
									<input type="hidden" name="creditbalance" id="creditbalance" value="<?= $user->user_profile->credit_balance ?>">
									<div class="col-md-12 row">	
										<div class="col-md-4 col-xl-4">
											<div class="mb-3">
												<label class="form-label">Select Travel Event</label>
												<select id="travel" class="form-control" name="travel_id">
														<option>Select Event</option>
														<?php foreach ($travels as $travel): ?>
														<option value="<?= $travel->id; ?>"  data-value="<?= $travel->id; ?>"> <?= $travel->travel_name; ?></option>
														<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="col-md-4 col-xl-4">
											<div class="mb-3">
												<label class="form-label">Please select your room/price preference:</label>
												<select id="cost" name="cost" class="form-control">
														<option>Select your Preference</option>
												</select>
											</div>
										</div>
										<div class="col-sm-12 row ">									
												<div id="card-element-travel"  class="form-control pt-2 mb-3 mr-md-3 rounded-0" style="display:none;"></div>
												<div id="payment-result-travel"></div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Save </button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>
									</div>
									<?= $this->Form->end(); ?>
								</div>
							</div>
							<div class="tab-pane" id="tab-credit">
								<div class="row mt-4">
									<?= $this->Form->create(null, ['id'=>'payment-form']); ?>
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
										   <label class="form-check-label" for="inlineText">Other</label>
										   <input class="form-control" name="custom_amount" id="custom_amount">
										</div>
									</div>
									<input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>">
									<div class="row">
										<div class="form-group col-md-6 col-lg-5">
											<label>Name of Card *</label>
											<input type="text" name ="card_name" class="form-control" placeholder="">
										</div>
										<div class="form-group col-md-6 col-lg-5">
											<label>Card Number *</label>
											<div id="card-element" class="form-control"></div>
											<div id="payment-result"></div>
										</div>									
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-primary ">Save </button>
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
<script src="https://js.stripe.com/v3/"></script>
<script>

	var validatePayment =  function () {
		//return false;
		//			stripePay("#card-element-event","payment-result-event","#payment_id");

		 // var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
			// var elements = stripe.elements();
			// var cardevent = elements.create('card');
			// cardevent.mount("#card-element-event");


			var resultContainer = document.getElementById("payment-result-event");
			cardevent.on('change', function(event) {
			  if (event.error) {
				resultContainer.textContent = event.error.message;
			  } else {
				resultContainer.textContent = '';
			  }
			});
				 
		  stripe.createPaymentMethod({
			type: 'card',
			card: cardevent,
		  }).then(handlePaymentMethodResult);
		  
	}
	
	var resultContainer = document.getElementById('payment-result-event'); 
	
	document.getElementById("eventreg").addEventListener('submit', function(event) {
	  event.preventDefault();
	  resultContainer.textContent = "";
	  
	  var userbalance   = $("#creditbalance").val();
		// console.log($("#fee").val());
		// console.log($("#quantity").val());
		if (($("#fee").val() * $("#quantity").val()) > userbalance)  	        	
		{	
			validatePayment();
		}
		else {
			
			document.getElementById("eventreg").submit();
		}
	  
	});
	
	
	
	
	function handlePaymentMethodResult(result) {
				console.log(result);
			  if (result.error) {
				  console.log("i am at 229");
				// An error happened when collecting card details, show it in the payment form
				resultContainer.innerHTML = "<p style='color:red;'>"+ result.error.message +"</p>";
			  } else {
				  
				  
				$(paymentElement).val(result.paymentMethod.id);
				form.submit();

			  }
			}
			
	function stripePay(elementName, resultElementName, paymentElement){
			//alert("The function called");
			var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
			//var stripe = Stripe('<?=  \Cake\Core\Configure::read('seattle_publickey'); ?>');  
			var elements = stripe.elements();
			var cardevent = elements.create('card');
			cardevent.mount(elementName);


			var resultContainer = document.getElementById(resultElementName);
			cardevent.on('change', function(event) {
			  if (event.error) {
				resultContainer.textContent = event.error.message;
			  } else {
				resultContainer.textContent = '';
			  }
			});
		}

</script>
<script>
$("#quantity").on("change",function() {
		var userbalance   = $("#creditbalance").val();
		// console.log($("#fee").val());
		// console.log($("#quantity").val());
		if (($("#fee").val() * $("#quantity").val()) > userbalance)  		
		{	
			$("#card-element-event").css('display', 'block');
			//stripePay("#card-element-event","payment-result-event","#payment_id");
		}
		else { 
		
		$("#card-element-event").css('display', 'none');
		}
	
});
</script>
<script>
$("#cost").on("change",function() {
		var userbalance   = $("#creditbalance").val();
		console.log('cost2: '+$("#cost").val());
		console.log('creditbalance2: '+$("#creditbalance").val());
		if (parseFloat($("#cost").val()) > parseFloat(userbalance))  		
		{	
			$("#card-element-travel").css('display', 'block');
			stripePay("#card-element-travel","payment-result-travel","travelreg","#payment_travelid");
		}
		else { 
			$("#card-element-travel").css('display', 'none');
		}
	
});
</script>

<script type="text/javascript">
$(document).ready(function() {
   $("#event").on("change",function() {	
		var eventid = $('option:selected',this).data("value");
	   var quantity =  document.getElementById('quantity');
	   quantity.value = 1;
		//alert (eventid);
		$.ajax({
            type: "POST", 
            url: '<?php echo $this->Url->build(["controller" => "Users", "action" => "change-event"]) ?>', 
            data: { "eventid": eventid},
            success: function(response){
				//console.log(response);
				//alert('Ohk');
				$('#fee').val(response);
				$('#totalfee').val(response);
				var userbalance   = $("#creditbalance").val();
				//console.log('fee: '+$("#fee").val());
				//console.log('quantity: '+$("#quantity").val());
				//console.log('balance: '+userbalance);
				
				//console.log(parseFloat(($("#fee").val() * $("#quantity").val())), parseFloat(userbalance));
				
				if (parseFloat(($("#fee").val() * $("#quantity").val())) > parseFloat(userbalance)) 
				{
					$("#card-element-event").css('display', 'block');
					stripePay("#card-element-event","payment-result-event","eventreg","#payment_id");
				}
				else {
					$("#card-element-event").css('display', 'none');
				}
				
			},
			  error: function(response){
				alert('Error!!');
			  }
		});
		//exit();
    }); 
	
	$("#travel").on("change",function() {		
       var travelid = $('option:selected',this).data("value");
		//alert (travelid);
		$.ajax({
            type: "POST", 
            url: '<?php echo $this->Url->build(["controller" => "Users", "action" => "change-travel"]) ?>', 
            data: { "travelid": travelid},
            success: function(response){
				//console.log(response['cost_single']);
				
				response = JSON.parse(response); 
				  
				$('#cost').html('<option value="' + response.cost_single + '"> Single Occupancy- $'+ response.cost_single + '</option><option value="' + response.cost_shared + '"> Shared Occupancy- $' + response.cost_shared + '</option>');
				$('#single').val(response.cost_single);
				$('#shared').val(response.cost_shared);
				var userbalance   = $("#creditbalance").val();
				console.log('cost1: '+$("#cost").val());
				console.log('creditbalance1: '+$("#creditbalance").val());
				if (parseFloat($("#cost").val()) > parseFloat(userbalance))  		
				{
				
				$("#card-element-travel").css('display', 'block');
				stripePay("#card-element-travel","payment-result-travel","travelreg","#payment_travelid");
				}
				else { 
					$("#card-element-travel").css('display', 'none');
					}
							
			},
			  error: function(response){
				alert('Error!!');
			}
		});
		
		
    }); 
	
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
	
});
</script>
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
	var stripe = Stripe('pk_test_QLUZjUEV4fjS3nOR3E5MI91z');
	//var stripe = Stripe('<?=  \Cake\Core\Configure::read('seattle_publickey'); ?>');  
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
	    fetch('.././addcredit', {
	      method: 'POST',  
	      headers: { 'Content-Type': 'application/json' },

	      body: JSON.stringify({userid: $("#userid").val(), amount: amount, payment_method_id: result.paymentMethod.id })
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