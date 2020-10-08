<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
<?php $this->TinymceElfinder->defineElfinderBrowser()?>
<div class="" id="" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="" role="document">
      <div class="card">
			<div class="card-header">
				<h5 class="card-title">Edit Event</h5>
				
			</div>       
			<?= $this->Form->Create($event, ['id'=>'editevent','class'=>'','type'=>'file']) ?>		 
			<div class="card-body">
				<div class="row">
					<div class="col-12">
							<ul class="nav nav-tabs nav-fill" data-toggle="tabs">
								<li class="nav-item">
									<a href="#tab-details" class="nav-link active" data-toggle="tab">
										1. Details
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-description" class="nav-link" data-toggle="tab">
										2. Description
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-ticket-info" class="nav-link" data-toggle="tab">
										3. Ticket Info
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-registration-info" class="nav-link" data-toggle="tab">
										4. Registration Info
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-notes" class="nav-link" data-toggle="tab">
										5. Notes
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-details">
									<div class="row mt-4">
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
												<label class="col-sm-3 control-label" for="color">Event Color</label>
												<div class="btn-group">
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#d1512e;"></button>
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#e0c34f;"></button>
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#00adef;"></button>
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#5b5f9e;"></button>
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#bf5c95;"></button>
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#6d6e72;"></button>
													<button type="button" class="btn btn-primary color" style="width:30px;height:30px;margin:2px;background-color:#1d9c40;"></button>
													
													<div id="select" style="width:55px;height:30px;margin: 2px;margin-left:30px;background-color:<?= $event->event_color ?>"></div>
													<?= $this->Form->control('event_color', ['label' => false, 'class'=> 'form-control ignore', 'id' => 'event_color','type'=>'hidden']) ?>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Event Name</label>
											  <?= $this->Form->control('event_name', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Event Name']) ?>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Start Date</label>
											  <div class="input-group date" id="e_start_date">
								                <input class="form-control ignore" name="start_date" required="true" id="e_start_date" value="<?= date('m/d/Y h-i A', strtotime($event->start_date))?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
								              </div>
											  <?php //$this->Form->control('start_date', ['label' => false, 'class'=> 'form-control', 'type' => 'datetime']) ?>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">End Date</label>
											  <div class="input-group date" id="e_end_date">
								                <input class="form-control ignore" name="end_date" value="<?= (!empty($event->end_date) ? date('m/d/Y h-i A', strtotime($event->end_date)) : '') ?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
								              </div>
											  
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Cancellation date</label>
											  <div class="input-group date" id="cancel_date">
								                <input class="form-control ignore" name="cancellation_date" value="<?= (!empty($event->cancellation_date) ? date('m/d/Y', strtotime($event->cancellation_date)) : '') ?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
								              </div>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Event Leader(s)</label>
											  <?= $this->Form->control('users._ids', ['options' => $leaders,'class'=> 'form-control ignore','label' => false]); ?>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Venue Name</label>
											  <?= $this->Form->control('venue_name', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Event Venue Name', 'required' => false]) ?>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Venue Address</label>
											  <?= $this->Form->control('venue_address', ['label' => false, 'class'=> 'form-control','type'=>'text', 'placeholder' => 'Venue Address', 'required' => false]) ?>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Venue Address2</label>
											  <?= $this->Form->control('venue_address2', ['label' => false, 'class'=> 'form-control','type'=>'text', 'placeholder' => 'Venue Address', 'required' => false]) ?>
											</div>
										</div>									
										<!--<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Event Attire</label>
											  <?= $this->Form->control('attire_id', ['options' => $attires, 'label' => false, 'class'=> 'form-control', 'placeholder' => 'e.g. casual,sports,dressy', 'required' => false]) ?>
											</div>
										</div>-->
										<div class="col-md-4 col-lg-4 col-xl-4"> 
											<div class="mb-3">
											  <label class="form-label">Event Attire</label>
											  <?= $this->Form->control('attire_id', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'e.g. casual,sports,dressy', 'required' => false, 'type'=>'text']) ?>
											</div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<div class="mb-3">
											  <label class="form-label">Event Photo</label>
											  <?= $this->Form->control('event_photo', ['label' => false, 'class'=> 'form-control','type'=>'file', 'required' => false]) ?>
											  <span>(Image size - height- 256px, width- 370px)</span><br>
												<?php if (empty($event->event_photo)): ?>
												<?= $this->Html->image('no-image.png', [ 'height'=>'50px']); ?>
												<?php else: ?>   
												<?= $this->Html->image('/files/event-photo/'.$event->event_photo, ['height'=>'50px']); ?>
												<?php endif; ?>
											</div>
										</div>							   
									</div>
									<div class="row d-flex">
				                       <div class="d-flex">
				                         <button type="button" class="btn btn-primary next-step">Next</button>
				                         <button type="button" class="btn btn-link prev-step">Previous</button>
				                      </div>
			                   		</div>
							</div>
							<div class="tab-pane" id="tab-description">
								<div class="row mt-4">
									<div class="col-md-12 col-lg-12 col-xl-12">
										<div class="mb-3">
										  <?= $this->Form->control('event_description', ['label' => false, 'class'=> 'form-control ignore', 'type'=> 'textarea', 'required' => false,'id'=>'description']) ?>
										</div>
									</div>
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                         <button type="button" class="btn btn-primary next-step">Next</button>
			                         <button type="button" class="btn btn-link prev-step">Previous</button>
			                      </div>
		                   		</div>
							</div>
							<div class="tab-pane" id="tab-ticket-info">
								<div class="row mt-4">
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Member Fee</label>
										  <?= $this->Form->control('event_fee', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => '(0=free)', 'type'=>'number', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Fee Description</label>
										  <?= $this->Form->control('event_fee_description', ['label' => false, 'class'=> 'form-control ignore','type'=>'text', 'placeholder' => 'e.g. includes soda', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Quantity Available</label>
										  <?= $this->Form->control('quantity', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'blank=unlimited', 'type'=>'number', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
											<label class="form-label">member_limit</label>
											<?= $this->Form->control('member_limit', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'of this ticket per member (blank=no limit)', 'type'=>'number', 'required' => false]) ?>
										</div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
											<label for="form-label">Limit Male/Female Regitrations</label>
												<input type="checkbox" id="checklimit" class="form-control ignore"/>
										</div>
									</div> 
									<div id="showlimit" <?php if (empty($event->male_limit) && (empty($event->female_limit))) { ?>  style="display:none"  <?php  } else { ?>   style="display:block" <?php  } ?>>
										<div class="col-md-4 col-lg-4 col-xl-4">
										   <div class="mb-3">
											  <label class="form-label">Male Registration Limit</label>
											  <?= $this->Form->control('male_limit', ['label' => false, 'class'=> 'form-control ignore', 'type'=>'number', 'required' => false]) ?>
										   </div>
										</div>
										<div class="col-md-4 col-lg-4 col-xl-4">
										   <div class="mb-3">
											  <label class="form-label">Female Registration Limit</label>
											  <?= $this->Form->control('female_limit', ['label' => false, 'class'=> 'form-control ignore', 'type'=>'number', 'required' => false]) ?>
										   </div>
										</div>
									</div>	
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                         <button type="button" class="btn btn-primary next-step">Next</button>
			                         <button type="button" class="btn btn-link prev-step">Previous</button>
			                      </div>
		                   		</div>
							</div>
							<div class="tab-pane" id="tab-registration-info">
								<div class="row mt-4">
									<div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
											  <label class="form-label">Registration Close Date</label>
											  <div class="input-group date" id="r_close_date">
								                <input class="form-control ignore" name="registration_close_date" value="<?= (!empty($event->registration_close_date) ? date('m/d/Y', strtotime($event->registration_close_date)) : '') ?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
								              </div>
											  
											</div>
									</div>
									<!-- <div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
										  <label class="form-label">Vendor</label>
										  <?php //$this->Form->control('vendor_id', ['label' => false, 'class'=> 'form-control ignore', 'type' => 'select', 'options' => $vendors, 'required' => false]) ?>
										</div>
									</div> -->
									<!-- <div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
										  <label class="form-label">Location</label>
										  <?php //$this->Form->control('location_id', ['label' => false, 'class'=> 'form-control', 'type' => 'select', 'options' => $locations, 'required' => false]) ?>
										</div>
									</div> -->
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                         <button type="button" class="btn btn-primary next-step">Next</button>
			                         <button type="button" class="btn btn-link prev-step">Previous</button>
			                      </div>
		                   		</div>
							</div>
							<div class="tab-pane" id="tab-notes">
								<div class="row mt-4">
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Event Cost</label>
										  <?= $this->Form->control('event_cost', ['label' => false, 'class'=> 'form-control ignore', 'type'=>'number']) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
											<label class="form-check form-check-inline check_top_padding">	
											<?= $this->Form->control('published', ['label' => false, 'class'=> 'form-check-input ignore', 'type' => 'checkbox']) ?>	
											<span class="form-check-label">Publish Immediately</span>
											</label>
										</div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
											<label class="form-check form-check-inline check_top_padding">											 
												<?= $this->Form->control('cancelled', ['label' => false, 'class'=> 'form-check-input ignore', 'type' => 'checkbox']) ?>									   
											 <span class="form-check-label">Cancelled</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6">
										<div class="mb-3">
											<label class="form-label">Official Notes</label>
										  <?= $this->Form->control('notes', ['label' => false, 'class'=> 'form-control ignore', 'type' => 'textarea']) ?>
										</div>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6">
										<div class="mb-3">
											<label class="form-label">Event Reminder Notes</label>
										  <?= $this->Form->control('event_reminder_notes', ['label' => false, 'class'=> 'form-control ignore', 'type' => 'textarea']) ?>
										</div>
									</div>
									
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                         <button type="submit" class="btn btn-primary save-event">Update</button>
                         			<button type="button" class="btn btn-link prev-step">Previous</button>
			                      </div>
			                   </div>
							</div>							
						</div>
					</div>
				</div>
			</div>
         <?= $this->Form->end(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function () {
        $("#checklimit").click(function () {
            if ($(this).is(":checked")) {
                $("#showlimit").show();
            } else {
                $("#showlimit").hide();
            }
        });

        

        $("#r_close_date").datetimepicker({
	        useCurrent: false,
	        format: "L",
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todayText',
	        }
	    });

	    $("#e_start_date").datetimepicker({
	        useCurrent: false,
	        //format: "L",
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todayText',
	        }
	    });

	    $("#e_end_date").datetimepicker({
	        useCurrent: false,
	        //format: "L",
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todayText',
	        }
	    });
		
		$("#cancel_date").datetimepicker({
			//format: 'YYYY-MM-DD',
			format: "L",
	        useCurrent: false,
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todayText',
	        }
	    });

        var $form = $("#editevent");
   		$form.validate( {
		rules: {					
			
			event_name: {
				required:true
			},
			start_date:{
				required:true
			}
		},
		messages:{		
			
			event_name: {
				required:"Please Enter Event Name"
			},
			start_date:{
				required:"Please select event start date and time"
			}
			
		},
		ignore: ".ignore"		
		});

		$(".next-step").click(function (e) {
	        var $active = $('.nav-tabs li>a.active');
	        $(document).find($($active).attr('href')).find('.ignore').each(function(){
	          $(this).removeClass('ignore');
	        });
	        //console.log($validForm);

	        if(!$form.valid()){
	        	console.log($form.valid());
	          return false;
	        }else{
	          nextTab($active);
	        }
        });
	    
	    $(".prev-step").click(function (e) {
	        var $active = $('.nav-tabs li>a.active');
	        prevTab($active);
	    });

	    function nextTab(elem) {
		  	$(elem).removeClass('active');
		    $(document).find($(elem).attr('href')).removeClass('active show');
		    $(elem).parent().next().find('a[data-toggle="tab"]').addClass('active');
		    $(document).find($(elem).parent().next().find('a[data-toggle="tab"]').attr('href')).addClass('active show');
		  
		   
		}
		function prevTab(elem) {
		  $(elem).removeClass('active');
		  $(document).find($(elem).attr('href')).removeClass('active show');
		  $(elem).parent().prev().find('a[data-toggle="tab"]').addClass('active');
		  $(document).find($(elem).parent().prev().find('a[data-toggle="tab"]').attr('href')).addClass('active show');
		}

		$("#e_start_date").datetimepicker();
    });
</script>
<script type="text/javascript">
$(function() {
   $( "button.color" ).on( "click", function() {
   $('div#select').css('background-color', $(this).css("background-color"));
   $('input[name="event_color"]').val($(this).css("background-color"));

});
});
</script>
<script>
$(document).ready(function(){
tinymce.init({
        file_browser_callback : elFinderBrowser,
        selector: '#description',
        height: 300,
        theme: 'modern',
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        plugins: [
        
        'image code',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
      
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar: 'undo redo | image code',
       
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
       
        templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        //'//www.tinymce.com/css/codepen.min.css'
        ],
       
    });
});
</script>