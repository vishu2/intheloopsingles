
<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Photo Album</h3>
		</div>
	</div>
</section>
<section class="gallery_sec">
	<div class="container">
		<div class="row gallery">
			<?php $i=1; foreach ($galleries as $gallery): ?>
			<div class="col-lg-3 col-md-4 col-6 thumb">
				<a href="<?= $gallery->url;?>">
					<span class="plus_icon d-flex align-items-center justify-content-center"><i class="fa fa-plus" aria-hidden="true"></i></span>
					<figure><?= $this->Html->image($gallery->url); ?></figure>
				</a>
			</div>
		  	<?php $i++; endforeach; ?>
			
		</div>
		<!-- <div class="more_div text-center"><a href="#" class="btn">View More</a></div> -->
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