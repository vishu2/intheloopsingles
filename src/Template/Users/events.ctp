<section class="inner_banner" style="background:url('img/banner-event.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Events</h3>
		</div>
	</div>
</section>
<!--<section class="event_sec gallery_sec">
	<div class="container">
		<div class="row show">
			<?php $count=1; foreach($events as $event){?>
			<div class="col-md-6 col-lg-4">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /><?= $event->venue_address; ?></span>
						</span>
						<figure><?= $this->Html->image('../files/event-photo/'.$event->event_photo, ['fullBase' => true]); ?></figure>
					</a>
					<div class="event_padd">
						<h5><?= $event->event_name; ?></h5>
						<div class="event_date">
							<span><i class="fa fa-calendar" aria-hidden="true"></i> <?= $event->start_date->format('d M, Y'); ?></span>
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $event->start_date->format('h-i A'); ?></span>
						</div>
						<p><?= $event->venue_address; ?></p>
						<div class="text-center"><a href="<?= $this->Url->build(['action' => 'eventdetails', $event->id])?>" class="more_btn">More Info</a></div>
					</div>
				</div>
			</div>
			<?php $count++; } ?>
			<input type="hidden" value="3" id="prevval">
		</div>
		<div class="more_div text-center"><a href="#" id="show_more" class="btn">View More</a></div>		
	</div>
</section>-->
<section class="event_sec gallery_sec" id="evEnt_fixedheight">
<?= $this->Flash->render() ?>
	<div class="container">
		<div class="row show">
			
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-hike.jpg', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Hiking</h5>
						<p>Join ITL for a fun 6 mile hike! Meet singles, get some exercise & enjoy the great outdoors!</p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-field-day.jpg', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>In the Loop Olympics (Field Day)</h5>
						<p>Battle it out on the field with your ITL friends! Participate in our Sumo Match, an Egg Toss, our Three Legged Race, Nerf through the Hoop and more! You'll be placed on Color Coded, Age Specific Teams!  May the odds be in your favor!</p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-ziplining.jpg', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Ziplining</h5>
						<p>Enjoy zooming through the air with your In the Loop friends! Do something fun and different this week and try Ziplining, ITL style! </p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-theater-night.png', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Theater Night</h5>
						<p> Calling all Theater Lovers! Join In the Loop for some fine entertainment! We will gather for a night on the town at the Theater! </p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row show">
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-single.jpeg', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Single Mingle</h5>
						<p> Meet a ton of ITL Singles in ONE night! Mix & mingle while you enjoy fun, get to know ya games, fabulous appetizers, live music and dancing! </p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-wine-taste.jpg', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Wine Tasting</h5>
						<p> If you love wine, you will LOVE this event with In the Loop Singles. Learn about amazing red wines, enjoy some tapas and spend the evening chit chatting with new, single friends!
						</p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event_img8.png', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Parasailing</h5>
						<p> Do something totally exhilarating this weekend with your ITL friends! We are Parasailing! Cross this amazing activity off your bucket list and meet some great friends while you're at it!
						</p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /></span>
						</span>
						<figure><?= $this->Html->image('event-peddle-tavern.jpg', ['class'=>'img-fluid']); ?></figure>
					</a>
					<div class="event_padd">
						<h5>Pedal Tavern Tour</h5>
						<p> Have a hilarious evening with In the Loop Singles as we pedal through downtown on the always fun, Pedal Tavern Trolley! Listen to some rocking tunes, meet some new buddies and try out some of the finest hotspots in town!
						</p>
						<div class="text-center"><a data-target="#joinus" data-toggle="modal" href="#joinus" class="more_btn">Join Us</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 mx-auto ">
				<div class="SampleCalendar_img  pt-4"><img src="https://s1.thedigifrog.com/intheloopsingles/img/SampleCalendar2.png" class="img-fluid"></div>
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
		
			url: '<?php echo $this->Url->build(["controller" => "users", "action" => "ajaxevents"]) ?>',
			type: "POST",
			dataType: "json",
			data: {offset:prevval},
			cache: false,
			success:function(response){
				
			if(response.data != ''){
				var html = '';
				$.each(response.data, function(i,v){
					html += '<div class="col-md-6 col-lg-4"><div class="event_box"><a href="#"><span class="locat_icon d-flex align-items-center justify-content-center"><span><img class="img-fluid" src="img/location.svg" alt="" />'+v.venue_address+'</span></span><figure><img src="/intheloopsingles/files/event-photo/'+v.event_photo+'" alt=""></figure></a><div class="event_padd"><h5>'+v.event_name+'</h5><div class="event_date"><span><i class="fa fa-calendar" aria-hidden="true"></i>'+v.start_date+'</span><span><i class="fa fa-clock-o" aria-hidden="true"></i>'+v.start_date+'</span></div><p>'+v.venue_address+'</p><div class="text-center"><a href="users/eventdetails/'+v.id+'" class="more_btn">More Info</a></div></div></div></div>'
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