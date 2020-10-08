<section class="banr_sec">
  <div class="bg-video-wrap">
  	
    <video src="../files/home-video/ITLWebPromo.mov" preload="none" loop muted autoplay>
    </video>
    <div class="overlay">
    </div>
    <h1>Fullscreen video background
    </h1>
  </div>
  <div class="bnr_content">
	  <div class="container">
		  <div class="row align-items-center">
			<div class="col-md-7">
				<div class="banr_text">
					<div class="social_links">
						<a href="#" title="" class="d-flex align-items-center justify-content-center insta_icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="#" title="" class="d-flex align-items-center justify-content-center google_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
						<a href="#" title="" class="d-flex align-items-center justify-content-center fb_icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<span>Social Links</span>
					</div>
					
					<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <h1 class="main_head"><span class="cyan_text">Have Fun!</span><span>Meet Singles.</span><span>Repeat.</span></h1>
						</div>
						<div class="carousel-item">
						  <h4 class="main_head"><span class="cyan_text">New Experiences.</span><span> Fun Activities.  </span><span class="cyan_text"> Amazing Trips. </span><span>Fantastic Singles. </span></h4>
						</div>
						<div class="carousel-item">
						  <p>The Best Way to Experience Amazing Activities &amp; Trips- Exclusively for <span class="cyan_text">Singles!</span></p>
						  <p><small>What are you waiting for?</small></p>
						</div>
						<div class="carousel-item">
						  <h1 class="main_head"><span class="cyan_text">Make Connections </span><span>& Meet Your People.</span></h1>
						</div>
						
						<!--<div class="carousel-item">
						  <h1 class="main_head"><span class="cyan_text">Have Fun!</span><span>Meet Singles.</span><span>Repeat.</span></h1>
						</div>-->
					  </div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="join_form">
					<h3>Find Out More!</h3>
					<?= $this->Form->create(null, ['id' => 'homeLeadSubmission']) ?>
					
					  <div class="form_line">
						  <div class="row">
							  <div class="col-6">
								  <div class="form-group"> 
								  	<?= $this->Form->control('first_name', ['class'=> 'form-control', 'placeholder' => 'First Name', 'label' =>false, 'div' => false]);?>
								  </div>
							  </div>
							  <div class="col-6">
								  <div class="form-group">
								  	<?= $this->Form->control('last_name', ['class'=> 'form-control', 'placeholder' => 'Last Name', 'label' =>false, 'div' => false]);?>
								  </div>
							  </div>
							  <div class="col-6">
								  <div class="form-group">
									<?= $this->Form->control('mobile_number', ['class'=> 'form-control', 'placeholder' => '(###) ###-####', 'label' =>false, 'div' => false, 'data-input-mask' => '(999) 999-9999']);?>
								  </div>
							  </div>
							  <div class="col-6">
								  <div class="form-group">
								  	<?= $this->Form->control('email', ['class'=> 'form-control', 'placeholder' => 'Email address', 'label' =>false, 'div' => false]);?>
								  </div>
							  </div>
							  <div class="col-6">
								  <div class="form-group">
									<?= $this->Form->select('location_id', $locations, ['class'=> 'form-control', 'empty' =>'Select Location', 'label' =>false, 'div' => false, 'id'=>'location_id']);?>
								  </div>
							  </div>
							  <div class="col-6">
								  <div class="form-group lead_source">
								  	<select class="form-control" name="lead_source_id" id="lead_source_id">
									  <option>How did you find us</option>
									</select>
								  </div>
							  </div>
						  </div>
					  </div>
					  <div class="text-center">
						<button type="submit" class="btn">Submit</button>
					  </div>
					  	<?= $this->Form->end() ?>
				</div>
			</div>
		  </div>
	  </div>
	</div>
</section>