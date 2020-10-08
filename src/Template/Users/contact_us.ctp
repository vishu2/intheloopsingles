<script src="https://www.google.com/recaptcha/api.js"></script>
<section class="inner_banner" style="background:url('img/banner-contact.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Contact Us</h3>
		</div>
	</div>
</section>
<section class="get_directions">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="text-left"><h3 class="sec_head">Get<br>Directions</h3></div>
			</div>			
			<div class="col-sm-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689.414900039372!2d-122.18109188436902!3d47.61806567918542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906c5f62e63b6b%3A0xe882e6a297d57371!2s12011%20Bel-Red%20Rd%20%23200%2C%20Bellevue%2C%20WA%2098005%2C%20USA!5e0!3m2!1sen!2sin!4v1595239942131!5m2!1sen!2sin" width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>				
				<h4>Seattle </h4>
				<?php foreach($seattles as $seattle){?>
				<p><?= $seattle->address; ?> <?= $seattle->city; ?>, <?= $seattle->state->state_code ?> <?= $seattle->zip; ?></p>
				<a href="#" class="mail_phone"><?= $seattle->phone; ?></a>
				<a href="#" class="mail_phone"><?= $seattle->location_path; ?></a>
				<?php } ?>
				<div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Business Hours
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php foreach($seattlehours as $seattlehour){?>
						<a class="dropdown-item" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $seattlehour->day; ?> <?= $seattlehour->timing; ?></a>
						<?php } ?>
					</div>
				</div>
				<a href="#" class="get_direct">Get Direction</a>
			</div>						
			<div class="col-sm-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3073.3145018535934!2d-104.90270358462817!3d39.62012197946564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c86fa5994bb61%3A0xcb937951c8b1f9dd!2s5350%20S%20Roslyn%20St%20%23160%2C%20Greenwood%20Village%2C%20CO%2080111%2C%20USA!5e0!3m2!1sen!2sin!4v1595240256112!5m2!1sen!2sin" width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>				
				<h4>Denver</h4>
				<?php foreach($denvers as $denver){?>
				<p><?= $denver->address; ?> <?= $denver->city; ?>, <?= $denver->state->state_code ?> <?= $denver->zip; ?></p>
				<a href="#" class="mail_phone"><?= $denver->phone; ?></a>
				<a href="#" class="mail_phone"><?= $denver->location_path; ?></a>
				<?php } ?>
				<div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Business Hours
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php foreach($denverhours as $denverhour){?>
						<a class="dropdown-item" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $denverhour->day; ?> <?= $denverhour->timing; ?></a>
						<?php } ?>
					</div>
				</div>
				<a href="#" class="get_direct">Get Direction</a>
			</div>						
			<div class="col-sm-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3439.842040375627!2d-97.69920398487551!3d30.440579481739917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644ce7f95aa306b%3A0xecc58f7af92e52bc!2s13915%20N%20Mopac%20Expy%20%23101%2C%20Austin%2C%20TX%2078728%2C%20USA!5e0!3m2!1sen!2sin!4v1595240312713!5m2!1sen!2sin" width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>				
				<h4>Austin</h4>
				<?php foreach($austins as $austin){?>
				<p><?= $austin->address; ?> <?= $austin->city; ?>, <?= $austin->state->state_code ?> <?= $austin->zip; ?></p>
				<a href="#" class="mail_phone"><?= $austin->phone; ?></a>
				<a href="#" class="mail_phone"><?= $austin->location_path; ?></a>
				<?php } ?>
				<div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Business Hours
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php foreach($austinhours as $austinhour){?>
						<a class="dropdown-item" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $austinhour->day; ?> <?= $austinhour->timing; ?></a>
						<?php } ?>
					</div>
				</div>
				<a href="#" class="get_direct">Get Direction</a>
			</div>			
		</div>
	</div>
</section>
<section class="get-in_sec">
	<div class="container">
		<h3>Get in Touch</h3>
		<p>Joining In The loop is life changing. Become a member and you'll immediately experience our fun, expertly organized activities just for Singles. Choose from events almost every day of the week! We do the planning, you just click and go. The activities and trips are a blast and meeting new single friends couldn't be easier.</p>
	</div>
</section>
<section class="cont_sec">
	<div class="container">
		<div class="text-left"><h3 class="sec_head">Contact Us</h3></div>
		<div class="row">
			<div class="col-sm-8">
			<?= $this->Flash->render(); ?>
				<?= $this->Form->create(null, ['id'=> 'contactc'])?>
				  <div class="row">
					<div class="form-group col-md-6">
					  <label for="input">Your name *</label>
					  
					   <?= $this->Form->control('name', ['label' => false, 'class'=> 'form-control', 'type' => 'text']) ?>
					</div>
					<div class="form-group col-md-6">
					  <label for="input">Your email address *</label>
					  
					   <?= $this->Form->control('email', ['label' => false, 'class'=> 'form-control', 'type' => 'email']) ?>
					</div>
				  </div>
				 
					<div class="form-group">
					  <label for="inputState">Subject *</label>
					   <?= $this->Form->control('subject', ['label' => false, 'class'=> 'form-control']) ?>
					 <!-- <select id="inputState" class="form-control">
						<option></option>
						<option>Subject</option>
					  </select>-->
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Message *</label>
						<!--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>-->
						 <?= $this->Form->textarea('message', ['label' => false, 'class'=> 'form-control', 'rows' => '3']) ?>
					 </div>
					 
					<div id="recaptcha" class="g-recaptcha brochure__form__captcha" data-sitekey="6LdBnLEZAAAAALvt5r1VAqGmwvQNrnbKHQmXR_QX"></div>
					
				  <button type="submit" id="submit" class="btn btn-primary">Send Message</button>
			<?= $this->Form->end(); ?>
			</div>
			<div class="col-sm-4 clint-img">
				<div class="clint-img_text">
					<h3 class="mb-0">Kara Donahue</h3>
						<p>
						Managing Member</br>
						ITL Singles
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="meet_sec">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-10">
				<h3>Meet new <strong>single</strong> friends without any pressure,<br> while having <strong>fun!</strong></h3>
				<h4>The <strong>BEST</strong> way to meet singles. <strong>PERIOD.</strong></h4>
			</div>
			<div class="col-sm-2">
				<a data-target="#joinus" data-toggle="modal" href="#joinus">Join Us</a>
			</div>
		</div>
	</div>
</section>

<script>
		$(document).ready(function() {
		
		$("#contactc").validate( {
		rules: {					
			name: {
				required:true
			},
			subject: {
				required:true
			},
			email: {
				required:true,
				email:true
			},	
			message: {
				required:true
			}
		},
		messages:{		
			name: {
				required: "Please Enter Name"
			},
			subject: {
				required:"Please enter your enquiry subject"
			},
			email: {
				required: "Please Enter Email",
				email:"Please Enter a Valid Email Address"
			},	
			message: {
				required:"Please Enter your Message"
			}
		},
		errorElement : 'span'		
		});		
		
		});
</script>