<section class="inner_banner signin_bnr">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Travel</h3>
		</div>
	</div>
</section>
<div class="text-center more_div"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="btn">Travel With Us</a></div>
<section class="travel_sec">
	<div class="container">
		<div class="text-center"><h3 class="sec_head">Amazing Travel Awaits.</h3></div>
		<div class="row align-items-center">
			<div class="col-md-4">
				<div class="trvlimg_box">
					<div class="trvl_img">
						<span><?= $this->Html->image('hero_pic_travel_page.jpg'); ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<p>In The Loop plans fantastic domestic and international vacations for our Single members to enjoy. We do the planning. You just click and GO! See the world as you make lifetime <i>friends</i> and lasting <i>memories!</i> Sign up for our upcoming vacations to Australia & New Zealand, Ireland and our Single's Summer Camp!</p>
				<div class="more_div"><a href="#" class="btn orange_btn">More Info</a></div>
			</div>
		</div>
	</div>
</section>
<!-- <section class="event_sec gallery_sec">
	<div class="container">
		<div class="row show">
			<?php $count=1; foreach($travels as $travel){?>
			<div class="col-md-6 col-lg-4">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /><?= $travel->travel_location; ?></span>
						</span>
						<figure><?= $this->Html->image('../files/travel-photo/'.$travel->featured_image, ['fullBase' => true]); ?></figure>
					</a>
					<div class="event_padd">
						<h5><?= $travel->travel_name; ?></h5>
						<div class="event_date">
							<span><i class="fa fa-calendar" aria-hidden="true"></i> <?= $travel->depart_date->format('d M, Y'); ?></span>
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $travel->depart_date->format('h-i A'); ?></span>
						</div>
						<p><?= $travel->travel_location; ?></p>
						<div class="text-center"><a href="<?= $this->Url->build(['action' => 'traveldetails', $travel->id])?>" class="more_btn">More Info</a></div>
					</div>
				</div>
			</div>
			<?php $count++; } ?>
			<input type="hidden" value="3" id="prevval">
		</div>
		<div class="more_div text-center"><a href="#" id="show_more" class="btn">View More</a></div>		
	</div>
</section>-->
<section id="demos" class="owl_slider travel_slider">
	<div class="container">
		<div class="travel_head">
			<h3 class="sec_head white_text">Amazing Travel</h3>
			<p>We do the planning. You just click and GO! See the world as you make lifetime friends and lasting memories!</p>
		</div>
		<div class="row">
			<div class="large-12 columns">
			  <div class="owl-carousel owl-theme">
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Australia / New Zealand Dream Vacation</a></h5>
				  <p>CAIRNS & SYDNEY, AUSTRALIA & QUEENSTOWN, NZ Join ITL on an EPIC vacation to Australia and New Zealand! We will begin in Cairns with a beautiful cruise of the Great Barrier Reef and learn about the aboriginal culture & wildlife! Next stop is Sydney to experience the infamous Bondi Beach, the iconic Sydney Opera house and more! The fun doesn’t stop there! Queenstown, NZ will be our final stop where we will take an all-day tour</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide2.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Costa Rica Adventure Trip</a></h5>
				  <p>CAIRNS & SYDNEY, AUSTRALIA & QUEENSTOWN, NZ Join ITL on an EPIC vacation to Australia and New Zealand! We will begin in Cairns with a beautiful cruise of the Great Barrier Reef and learn about the aboriginal culture & wildlife! Next stop is Sydney to experience the infamous Bondi Beach, the iconic Sydney Opera house and more! The fun doesn’t stop there! Queenstown, NZ will be our final stop where we will take an all-day tour</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide4.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Ski Trip to Breckenridge, CO</a></h5>
				  <p>Join ITL Singles as we enjoy the slopes in Breckenridge! Meet lifelong single friends at our picturesque, lodge accommodations. Participate in the funny, ITL “Winter Olympics”, enjoy catered meals, dance the night away at our Winter Wonderland Single’s Bash, and enjoy some of the best skiing and snowboarding in the US!</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Australia / New Zealand Dream Vacation</a></h5>
				  <p>CAIRNS & SYDNEY, AUSTRALIA & QUEENSTOWN, NZ Join ITL on an EPIC vacation to Australia and New Zealand! We will begin in Cairns with a beautiful cruise of the Great Barrier Reef and learn about the aboriginal culture & wildlife! Next stop is Sydney to experience the infamous Bondi Beach, the iconic Sydney Opera house and more! The fun doesn’t stop there! Queenstown, NZ will be our final stop where we will take an all-day tour</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide2.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Costa Rica Adventure Trip</a></h5>
				  <p>CAIRNS & SYDNEY, AUSTRALIA & QUEENSTOWN, NZ Join ITL on an EPIC vacation to Australia and New Zealand! We will begin in Cairns with a beautiful cruise of the Great Barrier Reef and learn about the aboriginal culture & wildlife! Next stop is Sydney to experience the infamous Bondi Beach, the iconic Sydney Opera house and more! The fun doesn’t stop there! Queenstown, NZ will be our final stop where we will take an all-day tour</p>
				</div>
				<div class="item">
				 <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide4.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Ski Trip to Breckenridge, CO</a></h5>
				  <p>Join ITL Singles as we enjoy the slopes in Breckenridge! Meet lifelong single friends at our picturesque, lodge accommodations. Participate in the funny, ITL “Winter Olympics”, enjoy catered meals, dance the night away at our Winter Wonderland Single’s Bash, and enjoy some of the best skiing and snowboarding in the US!</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Australia / New Zealand Dream Vacation</a></h5>
				  <p>CAIRNS & SYDNEY, AUSTRALIA & QUEENSTOWN, NZ Join ITL on an EPIC vacation to Australia and New Zealand! We will begin in Cairns with a beautiful cruise of the Great Barrier Reef and learn about the aboriginal culture & wildlife! Next stop is Sydney to experience the infamous Bondi Beach, the iconic Sydney Opera house and more! The fun doesn’t stop there! Queenstown, NZ will be our final stop where we will take an all-day tour</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide2.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Costa Rica Adventure Trip</a></h5>
				  <p>CAIRNS & SYDNEY, AUSTRALIA & QUEENSTOWN, NZ Join ITL on an EPIC vacation to Australia and New Zealand! We will begin in Cairns with a beautiful cruise of the Great Barrier Reef and learn about the aboriginal culture & wildlife! Next stop is Sydney to experience the infamous Bondi Beach, the iconic Sydney Opera house and more! The fun doesn’t stop there! Queenstown, NZ will be our final stop where we will take an all-day tour</p>
				</div>
				<div class="item">
				  <a data-target="#joinus" data-toggle="modal" href="#joinus"><?= $this->Html->image('travel_slide4.jpg'); ?></a>
				  <h5><a data-target="#joinus" data-toggle="modal" href="#joinus">Ski Trip to Breckenridge, CO</a></h5>
				  <p>Join ITL Singles as we enjoy the slopes in Breckenridge! Meet lifelong single friends at our picturesque, lodge accommodations. Participate in the funny, ITL “Winter Olympics”, enjoy catered meals, dance the night away at our Winter Wonderland Single’s Bash, and enjoy some of the best skiing and snowboarding in the US!</p>
				</div>
			  </div>
			</div>
		</div>
	</div>
</section>
<section class="gallery_sec bodr_top">
	<div class="container">
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
<script type="text/javascript">
$(document).ready(function(){
	$(document).on('click','#show_more',function(e){
		e.preventDefault();
		var prevval = $("#prevval").val();
		console.log(prevval);
		$.ajax({
			
			url: '<?php echo $this->Url->build(["controller" => "users", "action" => "ajaxtravels"]) ?>',
			type: "POST",
			dataType: "json",
			data: {offset:prevval},
			cache: false,
			success:function(response){
				
			if(response.data != ''){
				var html = '';
				$.each(response.data, function(i,v){
					html += '<div class="col-md-6 col-lg-4"><div class="event_box"><a href="#"><span class="locat_icon d-flex align-items-center justify-content-center"><span><img class="img-fluid" src="img/location.svg" alt="" />'+v.travel_location+'</span></span><figure><img src="/intheloopsingles/files/travel-photo/'+v.featured_image+'" alt=""></figure></a><div class="event_padd"><h5>'+v.travel_name+'</h5><div class="event_date"><span><i class="fa fa-calendar" aria-hidden="true"></i>'+v.depart_date+'</span><span><i class="fa fa-clock-o" aria-hidden="true"></i>'+v.depart_date+'</span></div><p>'+v.travel_location+'</p><div class="text-center"><a href="users/traveldetails/'+v.id+'" class="more_btn">More Info</a></div></div></div></div>'
				});										
					$('.show').append(html);
					$("#prevval").val(parseInt(prevval)+3);
			}else{
				$("#show_more").css("display", "none");
			}					
			}
		});
	});
});
</script>

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
<script>
	$(function() {
$('.owl-carousel').owlCarousel({
	items : 1,
	loop:true,
	autoplay:true,
	autoplayTimeout:4000,
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
		items: 3,
		nav: true,
		//loop: false,
		margin: 0
	  }
	}
});
	});
</script>