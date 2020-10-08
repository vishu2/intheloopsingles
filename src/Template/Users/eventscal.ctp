<style>
td .fc-event-container {color:#fff;}
</style>
<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Events</h3>
		</div>
	</div>
</section>
<script>
$(document).ready(function () {
	var calendar = $('#calendar').fullCalendar({		
	headerToolbar: {
    left: 'prevYear,prev,next,nextYear today',
    center: 'title',
    right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
	displayEventTime : false,
	navLinks: true,
    editable: false,
    dayMaxEvents: true,	
    events: [			
				<?php  foreach($events as $event) { ?>
                {                  
                    title: "<?= $event['event_name'] ?>",
                    start: "<?= $event['start_date'] ?>",
					//url: './eventdetails/<?= $event["id"] ?>',
					url: "<?= $this->Url->build(['controller' => 'users', 'action' => 'eventdetails' , base64_encode($event['id'])])?>",
					color: "<?= $event['event_color'] ?>",
					imageurl: "<?php if(empty($event['event_photo'])) { echo 'no-image.png'; } else { echo $event['event_photo']; }?>"				
                },
                <?php } ?>
    ],
	eventRender: function(event, element) {
                var content = '<a href="' + event.url + '"><img src="https://demo.intheloopsingles.com/files/event-photo/' + event.imageurl + '" ></a><br><h4>'+event.title+'</h4>' +
				'<p><b> '+ new Date(event.start).toDateString() + '</b></p>'+
                '<p><a href="' + event.url + '">Click for more info..</a></p>';
                element.qtip({
                    content: {
                        text: content,
						title: {
                               text: 'About Event',
                               button: 'Close'
                            }
                        },
						position: {
							my: 'center',
							at: 'center',
							target: $(document.body) 
							},
                    show: {
                        event: 'mouseenter'
                    },
                    hide: {
                        when: 'inactive',
                         delay: 5000
                    }
                });
            }
    });
});


</script>
<div class="text-center more_div">
<a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'event-listing'])?>" class="btn orange_btn">Back to List</a> 
</div>
<section class="event_sec gallery_sec">
	<div class="container">
		<div class="row">
			<div class="response"></div>
			<div id='calendar'></div>
		</div>		
	</div>
</section>
