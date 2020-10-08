<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">About Us</h3>
			<h4>Joining In The loop is <strong>life changing.</strong></h4>
		</div>
	</div>
</section>
<section class="become_sec">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-9">
				<p class="denver">Become a member of our Seattle, Denver, or Austin locations, and you'll immediately experience our fun, expertly organized activities just for Singles. Choose from a calendar of fun and diverse activities almost every day of the week! We do the planning, you just click and go. The events and trips are a blast and meeting new single friends couldn't be easier.</p>
			</div>
			<div class="col-sm-3">
				<a href="#" class="appointment_btn">Set your Appointment!</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 chek">
				<p>Check out this quick video and</p>
				<span>In the Loop!</span>
				<a class="welcome-itl" href="https://www.youtube.com/watch?v=SVFIjMQ7IAk"><?= $this->Html->image('video-1.png'); ?></a>
			</div>
			<div class="col-sm-4 loop">
				<span>In the Loop!</span>
				<p>Here's what your appointment will look like in a minute & a half!</p>
			</div>
			<div class="col-sm-4 vbii">
				<a class="appointment-itl" href="https://www.youtube.com/watch?v=BMcvMkMz_-Q"><?= $this->Html->image('vbii.png'); ?></a>
			</div>
		</div>
	</div>
</section>
<section class="loop_sec">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 dating">
				<h4>We are not a dating service</h4>
				<p>Meet new singles friends without any pressure! In the loop plans about 30 activities a month and 4-5 trips a year just for singles! Make new single friends the natural way, face to face while having fun!</p>
				<h4>We're here for you</h4>
				<p>Our staff is here to meet and screen all of our members personally. help you choose activities that are a great fit for you and we introduce you to other members at events. Breaking the ice has never been so fun and simple. The ITL staff are available to assist you 7 days a week, so don't be shy!</p>
			</div>
			<div class="col-sm-5 get_in">
				<h3 class="sec_head">GET IN THE LOOP</h3>
				<?= $this->Html->image('loop.png'); ?>
			</div>
		</div>
	</div>
</section>
<section class="membership_sec">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head">Membership</h3>
			<p>In the Loop Singles is a membership based activity and travel club. Our memberships breakdown to as low as about $20 per week. About half of our activities are completely free to attend or under $10.</p>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-1.png'); ?>
			</div>
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-2.png'); ?>
			</div>
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-3.png'); ?>
			</div>
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-4.png'); ?>
			</div>
		</div>
		<div class="row marg_top">
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-5.png'); ?>
			</div>
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-6.png'); ?>
			</div>
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-7.png'); ?>
			</div>
			<div class="col-sm-3">
				<?= $this->Html->image('staff-pic-8.png'); ?>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready(function() {
	$('.welcome-itl, .appointment-itl').magnificPopup({
		type: 'iframe'
	});
});
</script>