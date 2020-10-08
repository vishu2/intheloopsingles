<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Events</h3>
		</div>
	</div>
</section>
<div class="text-center more_div">
<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal'])?>" class="btn">Back to Calender</a>
</div>
<section class="event_sec gallery_sec">
	<div class="container">
		<div class="row show">
			<?php $count=1; foreach($events as $event){?>
			<div class="col-md-6 col-lg-4">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /><?= $event->venue_address; ?></span>
						</span>
						<figure>
						<?php if (empty($event->event_photo)): ?>
						<?= $this->Html->image('no-image.png', [ 'height'=>'250px']); ?>
						<?php else: ?>
						<?= $this->Html->image('../files/event-photo/'.$event->event_photo, ['fullBase' => true]); ?>
						<?php endif; ?>
						</figure>
					</a>
					<div class="event_padd">
						<h5><?= $event->event_name; ?></h5>
						<div class="event_date">
							<span><i class="fa fa-calendar" aria-hidden="true"></i> <?= $event->start_date->format('d M, Y'); ?></span>
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $event->start_date->format('h:i a'); ?></span>
						</div>
						<p><?= $event->venue_address; ?></p>
						<div class="text-center"><a href="<?= $this->Url->build(['action' => 'eventdetails', base64_encode($event->id)])?>" class="more_btn">More Info</a></div>
					</div>
				</div>
			</div>
			<?php $count++; } ?>
			<input type="hidden" value="3" id="prevval">
		</div>
		<div class="more_div text-center"><a href="#" id="show_more" class="btn">View More</a></div>		
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
					//var start= new Date(v.start_date); 
					
					html += '<div class="col-md-6 col-lg-4"><div class="event_box"><a href="#"><span class="locat_icon d-flex align-items-center justify-content-center"><span><img class="img-fluid" src="img/location.svg" alt="" />'+v.venue_address+'</span></span><figure><img src="../files/event-photo/'+v.event_photo+'" alt=""></figure></a><div class="event_padd"><h5>'+v.event_name+'</h5><div class="event_date"><span><i class="fa fa-calendar" aria-hidden="true"></i>'+moment(v.start_date).format('DD MMM, YYYY')+'</span><span><i class="fa fa-clock-o" aria-hidden="true"></i>'+moment(v.start_date).format('hh:mm a')+'</span></div><p>'+v.venue_address+'</p><div class="text-center"><a href="eventdetails/'+btoa(v.id)+'" class="more_btn">More Info</a></div></div></div></div>'
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