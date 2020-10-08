<section class="inner_banner signin_bnr">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Travel</h3>
		</div>
	</div>
</section>

 <section class="event_sec gallery_sec">
	<div class="container">
		<div class="text-center"><h3 class="sec_head">Amazing Travel Awaits.</h3></div>
		<div class="row show">
			<?php $count=1; foreach($travels as $travel){?>
			<div class="col-md-6 col-lg-4">
				<div class="event_box">
					<a href="#">
						<span class="locat_icon d-flex align-items-center justify-content-center">
							<span><img class="img-fluid" src="img/location.svg" alt="" /><?= $travel->travel_location; ?></span>
						</span>
						<figure><?= $this->Html->image('/files/travel-photo/'.$travel->featured_image, ['fullBase' => true]); ?></figure>
					</a>
					<div class="event_padd">
						<h5><?= $travel->travel_name; ?></h5>
						<div class="event_date">
							<span><i class="fa fa-calendar" aria-hidden="true"></i> <?= $travel->depart_date->format('d M, Y'); ?></span>
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $travel->depart_date->format('h:i A'); ?></span>
						</div>
						<p><?= $travel->travel_location; ?></p>
						<div class="text-center"><a href="<?= $this->Url->build(['action' => 'traveldetails', base64_encode($travel->id)])?>" class="more_btn">More Info</a></div>
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
			
			url: '<?php echo $this->Url->build(["controller" => "users", "action" => "ajaxtravels"]) ?>',
			type: "POST",
			dataType: "json",
			data: {offset:prevval},
			cache: false,
			success:function(response){
				
			if(response.data != ''){
				var html = '';
				$.each(response.data, function(i,v){
					html += '<div class="col-md-6 col-lg-4"><div class="event_box"><a href="#"><span class="locat_icon d-flex align-items-center justify-content-center"><span><img class="img-fluid" src="img/location.svg" alt="" />'+v.travel_location+'</span></span><figure><img src="../files/travel-photo/'+v.featured_image+'" alt=""></figure></a><div class="event_padd"><h5>'+v.travel_name+'</h5><div class="event_date"><span><i class="fa fa-calendar" aria-hidden="true"></i>'+moment(v.depart_date).format('DD MMM, YYYY')+'</span><span><i class="fa fa-clock-o" aria-hidden="true"></i>'+moment(v.depart_date).format('hh:mm a')+'</span></div><p>'+v.travel_location+'</p><div class="text-center"><a href="traveldetails/'+btoa(v.id)+'" class="more_btn">More Info</a></div></div></div></div>'
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
