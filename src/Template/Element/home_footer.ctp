<footer class="footer_sec">
	<div class="container">
		<span class="more_info">More Info</span>
		<div class="row">
			<div class="col-md-3">
				<h4>About Us</h4>
				<p class="info_text">We offer members with a fun and interactive way to meet like-minded singles. Events and activities include everything from sporting events, concerts and the great outdoors to wine tastings, fun-filled foody nights...</p>
				<a href="#" class="view_more">View More...</a>
			</div>
			<div class="col-md-3">
				<h4>Navigation</h4>
				<ul class="list-unstyled">
					<li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'home'])?>" title="">HOME</a></li>
					<li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'about-us']) ?>" title="">ABOUT US </a></li>
					
					 <?php  if(isset($user) && !empty($user)){ ?>  
					  <li><a href="<?= $this->Url->build(['action' => 'eventListing'])?>">EVENTS</a></li>
					  <?php } else { ?>
					  <li><a href="<?= $this->Url->build(['action' => 'events'])?>">EVENTS</a></li>
					  <?php } ?>
					
					<li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'stories']) ?>" title="">STORIES</a></li>
					
					<?php  if(isset($user) && !empty($user)){ ?>  
					  <li><a href="<?= $this->Url->build(['action' => 'travelListing'])?>">TRAVEL</a></li>
					  <?php } else { ?>
					  <li><a href="<?= $this->Url->build(['action' => 'travel'])?>">TRAVEL</a></li>
					  <?php } ?>
					
					<li><a data-target="#joinus" data-toggle="modal" href="#joinus" title="">JOIN US</a></li>
					<li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'contact-us']) ?>" title="">CONTACT US</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h4>Contact Us</h4>
				<div class="address_box">
					<?php foreach($footercontact as $footercontact){ ?>
					<div class="media">
						<div class="media-left"><?= $this->Html->image('home.svg'); ?></div>
						<div class="media-body">
							<p><span>Location :-</span> <?= $footercontact->location; ?></p>
						</div>
					</div>
					<div class="media align-items-center">
						<div class="media-left align-self-center"><?= $this->Html->image('call_blue.svg'); ?></div>
						<div class="media-body">
							<p><span>Phone :-</span> <?= $footercontact->phone; ?></p>
						</div>
					</div>
					<div class="media align-items-center">
						<div class="media-left align-self-center"><?= $this->Html->image('mail.svg'); ?></div>
						<div class="media-body">
							<p><span>Mail :-</span> <?= $footercontact->email; ?></p>
						</div>
					</div>
				</div>
					<?php } ?>
			</div>
			<div class="col-md-3">
				<h4>Stay In Touch!</h4>
				<p>Follow US in our social networks!</p>
				<?php foreach($links as $link){?>
				<div class="social_links d-flex">
					<a href="<?=  $link->facebook; ?>" title="" class="d-flex align-items-center justify-content-center fb_icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="<?=  $link->google; ?>" title="" class="d-flex align-items-center justify-content-center google_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					<a href="<?=  $link->instagram; ?>" title="" class="d-flex align-items-center justify-content-center insta_icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>
<section class="copy_right">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<p class="copy_text">© Copyright 2014 - 2020. All Rights Reserved.</p>
			<div class="privacy_link">
				<a href="#">Privacy Policy </a>
				<a href="#">|<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>|</a>
				<a href="#">VPS</a>
			</div>
		</div>
	</div>
</section>

