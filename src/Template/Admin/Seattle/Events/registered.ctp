<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Attendee List for <?= $events->event_name; ?>
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
				Attendees: <?= $totalCount; ?> / <?php if(!empty($events->quantity)) { echo $events->quantity ; } else { echo "∞"; }  ?>
			</h2>
		</div>
		<div class="col-auto ml-md-5 d-print-none">        
			Total Collected: $<?= ($events->event_fee)*($quantity); ?> <br>
			Total refunded: $<?= ($events->event_fee)*($refund); ?> <br>
			Total Cost: $<?= $events->event_cost; ?>
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
							<?= $this->Paginator->sort('Guest') ?>
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
						<th scope="col">
							<?= $this->Paginator->sort('Status') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Add Guest') ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if($events->event_registrations==null) { ?>
					<td colspan="9" style="text-align:center;"> No Event Attendee yet. </td>
					<?php } else { ?>
					<?php $i=1; foreach ($events->event_registrations as $event_user): ?>
					<!--<input type="hidden" value="<?= $event_user->id; ?>" name="id" id="id">
					<input type="hidden" value="<?= $event_user->user_id; ?>" name="user_id" id="user_id">
					<input type="hidden" value="<?= $event_user->event_id; ?>" name="event_id" id="event_id">
					<input type="hidden" value="<?= $event_user->quantity; ?>" name="quantity">
					<input type="hidden" value="1" name="is_cancelled">
					<input type="hidden" value="<?= $events->event_fee; ?>" name="event_fee">-->
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td <?php if (($event_user->user->user_profile->sex)=='1') {  } else { echo 'style="color:#ff00ff"';  } ?>>
							<?= $event_user->user->user_profile->first_name.' '.$event_user->user->user_profile->last_name ?>
						</td>
						<td>
							<?= $event_user->user->email ?>
						</td>
						<td>
							<?php 
								$dob = $event_user->user->user_profile->dob;
								$today = date("Y-m-d");
								$diff = date_diff(date_create($dob), date_create($today));
								echo $diff->format('%y');
							?>
						</td>
						<td>
							<?= $event_user->user->user_profile->mobile ?>
						</td>												
						<td>
							<?php if(empty($event_user->event_registration_guests)) { echo "N/A"; } else {  ?>
							<?php foreach ($event_user->event_registration_guests as $event_guest): ?>
							<?php if($event_guest->is_cancelled==0) { ?>
								<?= $event_guest->guest_name ?>- <?php if($event_guest->gender==1) { echo "Male"; } else if($event_guest->gender==2) { echo "Female"; } else { echo ""; } ?> <br>
							<?php } ?>	
							<?php endforeach; } ?>
						</td>
						<td>
							$<?php if($event_user->comp!=1) { echo (($event_user->quantity)*($events->event_fee));} else { echo "0";} ?>
						</td>	
						<td>
							<?php if($event_user->comp==0) { echo "No"; } else { echo "Yes"; }  ?>
						</td>
						<?php if($event_user->is_cancelled == 1) { ?> 
						<td><?php if($event_user->cancellation_status == 1) { echo "Cancelled by " . $event_user->users_staff->email .  " on " . date('d M, Y', strtotime($event_user->cancelled_date)); } else if($event_user->cancellation_status == 2) { echo "Cancelled & refunded by " . $event_user->users_staff->email .  " on " . date('d M, Y', strtotime($event_user->cancelled_date)); } else { echo ""; } ?> </td>
						<td>
							<?= $this->Form->postLink('<span class="fa fa-eye edit_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'hide', base64_encode($event_user->id)],['escape' => false,  'title' => __('Hide event')]) ?>
						</td>
						<?php } else { ?>
						<td colspan="2">
							
							<?= $this->Form->postLink('<span class="delete_btn">Cancel without refund</span><span class="sr-only">' . __('edit') . '</span>',['action' => 'cancelEvent', base64_encode($event_user->id), base64_encode($event_user->user_id) ,base64_encode($event_user->event_id)],['escape' => false ,'class' => __('cancel_without_refund')]) ?>
							
							<?= $this->Form->postLink('<span class="delete_btn">Cancel with refund</span><span class="sr-only">' . __('edit') . '</span>',['action' => 'cancelEventrefund', base64_encode($event_user->id), base64_encode($event_user->user_id),base64_encode($event_user->event_id) ],['escape' => false ,'class' => __('cancel_with_refund')]) ?>
							
						</td>						
						<td>
							<a href="#" title="Add Guest" class="guest btn btn-primary" data-id="<?= $event_user->id;?>" >
								<i class="fa fa-plus" aria-hidden="true"></i> Add
							</a>							
							<div id="add_data_Modal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">								  
									<div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title">Add Guest</h4>
										</div>
										<?= $this->Form->create(null, ['url' => [
												'controller' => 'Events',
												'action' => 'addguest'
											]])?>
										<div class="modal-body">
											<div class="row">
												<div class="container">
													<div class="form-group">
													<?= $this->Form->control('event_registration_id', ['label' => false, 'class'=> 'form-control', 'type' => 'hidden', 'required' => true]) ?>
														<div class="row">
															<div class="add-plus"><span id="add_aut" class="btn btn-primary"><i class="fa fa-plus"></i></span> Add</div>
															<div class="col-md-12 pt-3">
																
																<div id="auth-rows"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
											<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save</button>
										</div>	
										<?= $this->Form->end(); ?>	
									</div>
								</div>
							</div>							
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
         <?= $this->Form->Create(null, [ 'id'=>'registermember', 'url' => ['controller' => 'events','action' => 'registerMember', 
         base64_encode($events->id) ]]) ?>
         <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <?= $this->Form->Create(null, [ 'class'=>'card']) ?>
					<div class="row">
						<div class="col-md-5 col-lg-5 col-xl-5">
							<div class="mb-3">
							   <label class="form-label">Select Member</label>                          
								<select class="form-control" id="member" name="user_id" data-placeholder="Select Member...">
									
								</select>
							</div>
						</div>
						<div class="col-md-7 col-lg-7 col-xl-7">
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
						<label class="form-label">Event Fee</label> 
						<input type="text" readonly value="<?= $events->event_fee; ?>" name="event_fee" class="form-control">
					</div>
					<div class="row d-flex">
                       <div class="d-flex">
                         <button type="submit" name="lead_id" class="btn btn-primary">Save</button>
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
									'controller' => 'Events',
									'action' => 'send_sms', $events->id
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
									'controller' => 'Events',
									'action' => 'send_email', $events->id
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
$('input:radio[name="mode"]').on('change',function(){
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
				// An error happened when collecting card details, show it in the payment form
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
			// $(document).ready(function(){
				// jQuery(document).on('click','input[name="mode"]:radio',function(e){
					// console.log('input: '+$(this).val());
					// if ($(this).val() == "card") {
					// e.preventDefault()
					// //remove_element();
					
					// setTimeout(function(){
						// var tag = document.createElement("script");
				// tag.type = "text/javascript";
				// tag.src = "/tabler/js/card-element.js";
				// jQuery("div#card").append(tag);
				// // jQuery('.recaptcha-li-cust_refer_a_friend').html('');
					// // jQuery('.recaptcha-li-cust_email_to_teacher').html('<div class="g-recaptcha" data-sitekey="6Lf7X68ZAAAAAMAyjWey_BRNhGvwi4jHBLIdzYjM" data-badge="inline" data-size="invisible" data-callback="setResponse"></div></li>');
					// });
					// }
				// });
				
				// function remove_element(){
						// jQuery('script').each(function(){
						// if(jQuery(this).attr('src')==="/tabler/js/card-element.js'){"){
							
							// jQuery(this).remove();
						// } 
					// });
				// }			
			// });
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
            url: '<?php echo $this->Url->build(["controller" => "events", "action" => "show-member", $events->id ]) ?>', 
			success: function(response){
				//console.log(response);
				response = JSON.parse(response); 
				
				var html = '';
				$.each(response.userData, function(i,data){
					html += '<option selected="selected"></option><option value="'+data.id+'">'+data.user_profile.first_name+' '+data.user_profile.last_name+' -'+data.user_profile.mobile+'</option>';
					
				});
				
				$("#member").append(html);
				$("#member").selectize();	
				$(".loader").css('display', 'none');
				$("#add-user").modal('show');
			},
			error: function(response){
				alert('Error!!');
			}

		});

		
    }); 	
});
</script>
<script>
$(document).ready(function(){
tinymce.init({
        file_browser_callback : elFinderBrowser,
        selector: '.email',
        height: 300,
        theme: 'modern',
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        plugins: [
        // 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'image code',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        // 'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar: 'undo redo | image code',
        //images_upload_url: '<?php echo $this->Url->build('/admin/cms-pages/upload'); ?>',
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        // image_advtab: true,
        templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        //'//www.tinymce.com/css/codepen.min.css'
        ],
       
    });
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	    var i = 0;
        $("#add_aut").click(function(e){
	    var rowCount = $(document).find(".parent-autor").length;
	    if(typeof rowCount == "undefined"){
    		var html3 = '<div class="row parent-autor">  <div class="row"> <div class="col-md-4"> <div class="form-group"><input type="text" name="event_registration_guests[0][guest_name]" class = "form-control mb-3" required/> </div> </div> <div class="col-md-4"> <div class="form-group"> <input type="radio" name="event_registration_guests[0][gender]" value="1">Male <input class="ml-3" type="radio" name="event_registration_guests[0][gender]" value="2">Female</div> </div><div class="col-md-4" id="auth-del" title="Delete" ><p ><i class="fa fa-minus-square text-danger" aria-hidden="true"></i></p> </div></div></div>';
	    }else{
	    	var html3 = '<div class="row parent-autor">  <div class="row"> <div class="col-md-4"> <div class="form-group"><input type="text" name="event_registration_guests['+rowCount+'][guest_name]" class = "form-control mb-3" required/> </div> </div> <div class="col-md-4"> <div class="form-group"> \ <input type="radio" name="event_registration_guests['+rowCount+'][gender]" value="1" >Male <input class="ml-3"  type="radio" name="event_registration_guests['+rowCount+'][gender]" value="2">Female </div> </div> <div class="col-md-4" id="auth-del" title="Delete"><p ><i class="fa fa-minus-square text-danger" aria-hidden="true"></i></p> </div></div></div>';
	    }
		
            $('#auth-rows').append(html3);
			i += 1;
        });
        $('#auth-rows').on('click', '#auth-del', function(E){
            $(this).parent('div').remove();
        });
	});	
</script>

<script>
$(function() {
    $(document).on('click', '.guest', function(){
      var $this = $(this);
      $("#event-registration-id").val($this.attr('data-id'));
      $("#add_data_Modal").modal('show');
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
/*#auth-del{background: red;}*/
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
