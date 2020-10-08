<section class="detail_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<?php if (empty($event->event_photo)): ?>
				<?= $this->Html->image('no-image.png', [ 'height'=>'250px']); ?>
				<?php else: ?>
				<img src="<?= ('../../../../files/event-photo/'.$events->event_photo); ?>">
				<?php endif; ?>
			</div>
			<div class="col-md-7">				
				<h2><?= $events->event_name ?></h2>
				<h5>Date & Time</h5>
				<p><?= date('d M, Y', strtotime($events->start_date)); ?> at <?= date('h-i A', strtotime($events->start_date)); ?></p>
				<p><span><?= $events->venue_name ?></span> <br><span><?= $events->venue_address ?></span></p>
						
			</div>
		</div>		
		<div class="event_detail">
			<div class="row">
				<div class="col-lg-9"><br>
					<h4><b>Description</b></h4>
					<p><label><b>Event Cost: $<?= $events->event_cost; ?></b></label>(<?= $events->event_fee_description; ?>)</p>
					<p><label><b>Recommended Attire:</b></label><?= $events->attire_id ?></p>
					<p><label><b>Event Leader(s):</b></label>
					<?php foreach ($events->users as $users): ?>
					<?= $users->user_profile->first_name .' '. $users->user_profile->last_name .' - '. $users->user_profile->mobile ; ?> <br>
					 <?php endforeach; ?>
					</p>
					<?= $events->event_description; ?>
					<?php if (!empty($events->registration_close_date)) { ?>
					<h4>Registration Closes On: <?= date('d M, Y', strtotime($events->registration_close_date)); ?>
					</h4>
					<?php } ?>					
					<p style="color:#990000;font-style:italic;font-weight: bold;">
					<?php if(!empty($events->cancellation_date)) {   ?>
					Cancellation Policy: You must cancel your reservation by <?php echo date('d M, Y', strtotime($events->cancellation_date));  ?> to receive a credit refund on this event.  
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
	</div>
</section>
<style>
	.ElementsApp{font-size: 16px;}
</style>