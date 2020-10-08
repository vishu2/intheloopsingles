<section class="activiti_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h4>The Best Way to Experience Amazing</h4>
				<h4>Activities & Trips- Exclusively for <span class="single_text">Singles !</span></h4>
				<a href="#" title="" class="wait_for">What are you waiting for?</a>
			</div>
			<div class="col-md-4">
				<div class="getstart_div">
					<a href="#" class="btn">Get Started Now!</a>
					<span class="or">or</span>
					<a href="#" class="learn_more">Learn More.</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="about_box mrgTop-100">
	<div class="container">
		<div class="text-center"><h3 class="sec_head">About ITL</h3></div>
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="about_img">
					<img src="img/video.jpg" alt="" class="img-fluid" />
				</div>
			</div>
			<div class="col-md-6">
				<h4>Joining In The loop is life changing.</h4>
				<p>Become a member of our Seattle, Denver, or Austin locations, and you'll immediately experience our expertly organized activities just for Singles. Choose from a calendar of fun and diverse activities almost every day of the week! We do the planning, you just click and go. The events and trips are a blast and meeting new single friends couldn't be easier.</p>
				<a data-target="#joinus" data-toggle="modal" href="#joinus" class="btn">Join Us</a>
			</div>
		</div>
	</div>
</section>
<section class="calendar_sec">
	<div class="container">
		<div class="event_example">
			<div class="text-left"><h3 class="sec_head white_text">Calendar of Activities</h3></div>
			<h4>Event Examples</h4>
			<p>What are you doing this week? At ITL choose from events like hiking, biking, river rafting, comedy club nights, concerts, museum exhibits, foodie nights, skiing, horseback riding, bonfires, game nights, cooking classes, wine tastings, bowling nights, boating events, movie nights, golfing, trivia, theater events, festivals, camping, canoeing, ghost tours, speed minglers, adult field day, pub crawls, upscale cocktail parties, picnics, paddle boarding...you name it, we try!</p>
			<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'events'])?>" class="btn">View More</a>
		</div>
	</div>
</section>
<section id="demos" class="owl_slider mrgTop-100 clients_silder">
	<div class="container">
		<div class="text-center"><h3 class="sec_head">What Our Clients Say</h3></div>
		<div class="row">
			<div class="large-12 columns">
			  <div class="owl-carousel owl-theme">
				<?php foreach($stories as $story){?>
				<div class="item">
				  <img class="testimonial_icon" src="img/testimonial_icon.png" alt="" />
				  <p class="client_feed"><?= $story->story_content; ?></p>
					<div class="media align-items-center">
					  <span><?= $this->Html->image('../files/member-story-image/'.$story->story_image, ['fullBase' => true]); ?></span>
					  <div class="media-body">
						<h5 class="mt-0"><?= $story->member_name; ?></h5>
					  </div>
					</div>
				</div>
				<?php } ?>
			</div>
			</div>
		</div>
	</div>
</section>
<section class="album_sec">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<div class="photo_albm">
				<h4>Photo Album</h4>
				<h3><span>Seattle,</span> Denver to Austin Locations</h3>
			</div>
			<div class="more_photo">
				<a href="<?= $this->Url->build(['action' => 'gallery'])?>" class="btn">View More</a>
			</div>
		</div>
	</div>
</section>

<script>
	$(function() {
		
	    $('#mobile-number').mask('(000) 000-0000');
		/**Homepage lead form submission start**/
	    $("#homeLeadSubmission").validate({
	        rules: {
	            first_name: {
	                required: true
	            },
	            last_name: {
	                required: true
	            },
	            email: {
	                required: true,
	                email: true
	            },
	            mobile_number: {
	                required: true
	            },
	            location_id: {
	                required: true
	            },
	            lead_source_id: {
	                required: true
	            },
	        },
	        messages: {
	            first_name: {
	                required: "Please enter your first name",
	            },
	            last_name: {
	                required: "Please enter your last name",
	            },
	            email: {
	                required: "Please enter your email address",
	            },
	            mobile_number: {
	                required: "Please enter your contact",
	            },
	            location_id: {
	                required: "Please select location",
	            },
	            lead_source_id: {
	                required: "Please select any source",
	            }
	        },
	        submitHandler: function(form, event) {
	        	var $form = $(form),
	        	$submitButton = $(this.submitButton);
	        	var form_location = $form.find('#location_id').val();
	        	var leadphone = $form.find('#mobile-number').val().replace(/\D/g,'');
	        	$form.find('#mobile-number').val('+1'+leadphone);
	        	$.ajax({
	                    type: "POST", 
	                    url: "<?php echo $this->Url->build(['controller' => 'users', 'action' => 'ajax-lead-submission']);?>",
	                    data: {
	                        lead_name: $form.find('#first-name').val()+' '+$form.find('#last-name').val(),
	                        lead_phone: $form.find('#mobile-number').val().replace(/\D/g,''),
	                        lead_mobile: $form.find('#mobile-number').val().replace(/\D/g,''),
	                        lead_email: $form.find('#email').val(),
	                        location_id: $form.find('#location_id').val(),
	                        lead_source_id: $form.find('#lead_source_id').val(),
	                        
	                    },
	                    success: function(response) {
	                        var json = JSON.parse(response);
	                        if (json.status == 'success') {
	                            /*swal({
	                                icon: 'success',
	                                title: 'Success',
	                                text: 'Successfully sent.'
	                            });*/
	                           var newURL = "?name=" + $form.find('#first-name').val() + "%20" + $form.find('#last-name').val() + "&email=" + $form.find('#email').val() + "&mobile=" + $form.find('#mobile-number').val(); 
	                    	   jQuery('#homeLeadSubmission')[0].reset();
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
	            //if ($("#resume-file").val() == '') {
	                /*swal({
	                        title: "Are you sure?",
	                        text: "You want to use your previous uploaded resume to apply this job!",
	                        icon: "warning",
	                        buttons: {
	                            cancel: true,
	                            confirm: "Confirm"
	                        },
	                        dangerMode: true,
	                    })
	                    .then((willDelete) => {
	                        if (willDelete) {
	                            var user_id = '<?php //echo (isset($userData) && !empty($userData)) ? $userData->id : ""; ?>';
	                            
	                        }
	                    });*/
	            
	        }
	    });
	    /**Homepage lead form submission end**/

	    /*On change location loading Lead sources start*/
	    $(document).on('change', '#location_id', function(){
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

	                        $("#lead_source_id option").remove();
	                        var htmlOption = '<option>How did you find us</option>';
	                        $.each(json, function( key, value ) {
	                        	//console.log(key +'  '+ value);
							  htmlOption += '<option value="'+key+'">'+value+'</option>';
							});
							$("#lead_source_id").append(htmlOption)
	                    	//console.log(htmlOption);
	                    	return false;

	                    }
	                });
	    	}
	    });
	    /*On change location loading Lead sources end*/

		$('.owl-carousel').owlCarousel({
			items : 1,
			loop:true,
			autoplay:true,
			autoplayTimeout:6000,
			autoplayHoverPause:true,
			responsiveClass: true,
			responsive: {
			  0: {
				items: 1,
			  },
			  600: {
				items: 1,
			  },
			  768: {
				items: 2,
			  },
			  1000: {
				items: 2,
				nav: true,
				//loop: false,
				margin: 0
			  }
			}
		});
	});
</script>
