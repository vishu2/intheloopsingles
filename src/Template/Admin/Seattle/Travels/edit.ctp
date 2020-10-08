<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
<?php $this->TinymceElfinder->defineElfinderBrowser()?>
<!-- <div class="" id="" tabindex="-1" role="dialog" aria-hidden="true"> -->
	<!-- <div class="" role="document"> -->
	<div class="row">
		<div class="col-12 card">
			<div class="card-header">
				<h4 class="card-title">Edit Travel Event</h4>           
			</div>
			<?= $this->Form->Create($travel, ['id'=>'edittravel','class'=>'convert-lead','type'=>'file']) ?>
			<div class="card-body">
				<div class="row">
					<!-- <div class="col-12"> -->
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
										  <label class="form-label">Travel Name</label>
										  <?= $this->Form->control('travel_name', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Event Name']) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Travel Location</label>
										  <?= $this->Form->control('travel_location', ['label' => false, 'class'=> 'form-control ignore']) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label" for="depart_date">Depart Date</label>
										  <!-- <label for="e_date">Date to</label> -->
							              <div class="input-group date" id="d_date">
							                <input class="form-control ignore" name="depart_date" required="true" value="<?= date('m/d/Y h:i A', strtotime($travel->depart_date))?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
							              </div>
										  <?php //$this->Form->control('depart_date', ['label' => false, 'class'=> 'form-control ignore']) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label" for="return_date">Return Date</label>
										  <div class="input-group date" id="r_date">
							                <input class="form-control ignore" name="return_date" value="<?= (!empty($travel->return_date) ? date('m/d/Y h:i A', strtotime($travel->return_date)) : '') ?>" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
							              </div>
										  <?php //$this->Form->control('return_date', ['label' => false, 'class'=> 'form-control', 'required' => false]) ?>
									   </div>
									</div>							   
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Travel Photo</label>
										  <?= $this->Form->control('featured_image', ['label' => false, 'class'=> 'form-control ignore', 'type' => 'file' , 'required' => false]) ?>
										  <span>(Image size - height- 256px, width- 370px)</span><br>
										<?php if (empty($travel->featured_image)): ?>
											<?= $this->Html->image('no-image.png', [ 'height'=>'50px']); ?>
											<?php else: ?>   
											<?= $this->Html->image('/files/travel-photo/'.$travel->featured_image, ['height'=>'50px']); ?>
											<?php endif; ?>
									   </div>
									</div>
									<!-- <div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Location</label>
										  <?php //$this->Form->control('location_id', ['label' => false, 'class'=> 'form-control ignore', 'required' => false ,'options' => $locations ]) ?>
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
							<div class="tab-pane" id="tab-description">
								<div class="row mt-4">
									<div class="col-md-6 col-lg-6 col-xl-6">
									   <div class="mb-3">
										<label class="form-label">Description</label>
										  <?= $this->Form->control('description', ['label' => false, 'class'=> 'form-control ignore', 'type'=> 'textarea', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6">
									   <div class="mb-3">
										<label class="form-label">Summary</label>
										  <?= $this->Form->control('summary', ['label' => false, 'class'=> 'form-control ignore', 'type'=> 'textarea', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6">
									   <div class="mb-3">
										<label class="form-label">Included</label>
										  <?= $this->Form->control('included', ['label' => false, 'class'=> 'form-control ignore', 'type'=> 'textarea', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6">
									   <div class="mb-3">
										<label class="form-label">Excluded</label>
										  <?= $this->Form->control('excluded', ['label' => false, 'class'=> 'form-control ignore', 'type'=> 'textarea', 'required' => false]) ?>
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
										  <label class="form-label">Single Occupancy</label>
										  <?= $this->Form->control('cost_single', ['label' => false, 'class'=> 'form-control ignore', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Shared Occupancy</label>
										  <?= $this->Form->control('cost_shared', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => '0=N/A', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Single Occupancy Deposit</label>
										  <?= $this->Form->control('deposit_single', ['label' => false, 'class'=> 'form-control ignore', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Shared Occupancy Deposit</label>
										  <?= $this->Form->control('deposit_shared', ['label' => false, 'class'=> 'form-control ignore', 'required' => false]) ?>
									   </div>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Quantity Available</label>
										  <?= $this->Form->control('quantity', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'blank=unlimited', 'required' => false]) ?>
									   </div>
									</div>								
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Pay Due Date</label>
										  <div class="input-group date" id="pay_date">
							                <input class="form-control ignore" name="pay_due" value="<?= (!empty($travel->pay_due) ? date('m/d/Y h:i A', strtotime($travel->pay_due)) : '') ?>" /><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
							              </div>
										  <?php //$this->Form->control('pay_due', ['label' => false, 'class'=> 'form-control ignore','type'=>'datetime']) ?>
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
							<div class="tab-pane" id="tab-notes">
								<div class="row mt-4">
									<div class="col-md-4 col-lg-4 col-xl-4">
									   <div class="mb-3">
										  <label class="form-label">Travel Cost</label>
										  <?= $this->Form->control('travel_cost', ['label' => false, 'class'=> 'form-control ignore','type'=>'number']) ?>
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
									<div class="col-md-12 col-lg-12 col-xl-12">
									   <div class="mb-3">										 
										  <?= $this->Form->control('notes', ['label' => false, 'class'=> 'form-control ignore', 'type' => 'textarea']) ?>
									   </div>
									</div>
									<!--<div class="col-md-4 col-lg-4 col-xl-4">
										<div class="mb-3">
											<label class="form-check form-check-inline">										 
											<?= $this->Form->control('published', ['label' => false, 'class'=> 'form-check-input ignore', 'type' => 'checkbox']) ?>								   
											<span class="form-check-label">Publish Immediately</span>
											</label>									  
										</div>
									</div>-->
									
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                         <button type="submit" class="btn btn-primary save-travel-event">Update</button>
                         			<button type="button" class="btn btn-link prev-step">Previous</button>
			                      </div>
			                   </div>
							</div>
						</div>
					<!-- </div> -->
				</div>
			</div>			
        <?= $this->Form->end(); ?>
		</div>
	</div>
	<!-- </div> -->
<!-- </div> -->
<script type="text/javascript">
    $(function () {

	 	var $form = $("#edittravel");
   		$form.validate( {
		rules: {					
			travel_name: {
				required:true
			},
			travel_location: {
				required:true
			},
			depart_date: {
				required:true
			},
			cost_single: {
				currency: ["$", false]
			},
			cost_shared: {
				currency: ["$", false]
			},
			deposit: {
				currency: ["$", false]
			},
			quantity: {
				number:true
			},
			travel_cost: {
				currency: ["$", false]
			}
		},
		messages:{		
			travel_name: {
				required:"Please Enter Travel Name"
			},
			travel_location: {
				required:"Please Enter Travel Location"
			},
			depart_date: {
				required:"Please Select travel depart date"
			},
			cost_single: {
				currency: "Please Enter Valid single cost"
			},
			cost_shared: {
				currency: "Please Enter Valid shared cost"
			},
			deposit: {
				currency: "Please Enter Valid shared cost"
			},
			quantity: {
				number:"Please Enter a Valid numeric value"
			},
			travel_cost: {
				currency: "Please Enter Valid shared cost"
			}
		},
		errorPlacement: function (error, element) {
			if(element.attr('name') === 'depart_date'){
				console.log(element.attr('name'))
		    	error.insertAfter($(element).parent('div')); 
			}else{
		    	error.insertAfter($(element)); 

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

		$("#d_date").datetimepicker({
	        useCurrent: false,
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          up: "fa fa-chevron-up",
	          down: "fa fa-chevron-down",
	          previous: "fa fa-chevron-left",
	          today: 'todayText',
	        }
	    });

	    $("#r_date").datetimepicker({
	        useCurrent: false,
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          up: "fa fa-chevron-up",
	          down: "fa fa-chevron-down",
	          today: 'todayText',
	        }
	    });

	    $("#pay_date").datetimepicker({
	        useCurrent: false,
	        format: "L",
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todayText',
	        }
	    });

    });
</script>
<script>
$(document).ready(function(){
tinymce.init({
        file_browser_callback : elFinderBrowser,
        selector: 'textarea',
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