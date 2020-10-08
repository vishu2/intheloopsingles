<section class="inner_banner" style="background:url('img/banner-story1.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Stories</h3>
		</div>
	</div>
</section>
<section class="storie_sec">
	<div class="container">
		<h3>Read what In the Loop members are saying about us...</h3>
		<?php foreach($stories as $story){?>
		<div class="storie_box">
			<div class="media align-items-center">
				<div class="media-right order-md-3"><span class="storie_img"><?= $this->Html->image('../files/member-story-image/'.$story->story_image, ['fullBase' => true]); ?></span></div>
				<div class="media-body">
					<?= $this->Html->image('testimonial_icon.png'); ?>
					<p><?= $story->story_content; ?></p>
					<h4><?= $story->member_name; ?></h4>
				</div>
				
			</div>
		</div>
		<?php } ?>
	</div>
</section>
<section class="gallery_sec">
	<div class="container">
		<h3>Love our member</h3>
		<div class="row gallery">
			<?php foreach($galleries as $gallery){?>
			<div class="col-lg-3 col-md-4 col-6 thumb">
				<a href="./<?= $gallery->url; ?>">
					<span class="plus_icon d-flex align-items-center justify-content-center"><i class="fa fa-plus" aria-hidden="true"></i></span>
					<figure><?= $this->Html->image($gallery->url, ['class'=>'img-fluid']); ?></figure>
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<section class="getstart_sec bodr_top">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<div class="">
				<h4>The Best Way to Experience Amazing Activities & Trips- Exclusively for Singles!</h4>
			</div>
			<div class="more_photo">
				<a href="#" class="btn">Get Started Now!</a>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready(function() {
	$(".gallery").magnificPopup({
		delegate: "a",
		type: "image",
		tLoading: "Loading image #%curr%...",
		mainClass: "mfp-img-mobile",
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		}
	});
});

</script>