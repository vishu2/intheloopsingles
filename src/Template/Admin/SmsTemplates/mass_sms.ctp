<div class="" id="" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="" role="document">
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title">Bulk Sms</h5>				
			</div>       				 
			<div class="card-body">
				<div class="row">
					<div class="col-12" id="massSms">
							<ul class="nav nav-tabs " data-toggle="tabs">
								<li class="nav-item">
									<a href="#tab-send" class="nav-link active" data-toggle="tab">
										1. Send SMS
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-report" class="nav-link" data-toggle="tab">
										2. SMS Report
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-send">
								<div class="row mt-4">
									<div class="col-md-12">	
										<h3 class="table-active text-center py-2">Send Test SMS</h3>
										<div class="col-md-10 col-xl-12">
											<div class="row">
												<div class="col-md-6 col-xl-6">
													<div class="mb-3">
														<label class="form-label">Send a Test SMS to</label>
														<?= $this->Form->control('contact', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Phone no.']) ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-10 col-xl-12">									
												<div class="mb-3">
													<label class="form-label">Enter SMS Text</label>
													<?= $this->Form->control('template_body', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter SMS Text','type'=>'textarea']) ?>
												</div>										
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Send Test SMS</button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>
									</div>
									<div class="col-md-12 mt-4">
										<h3 class="table-active text-center py-2">Create Mass SMS Filter</h3>	
										<?= $this->Form->Create($smsTemplate, [ 'class'=>'card border-0 rounded-0 ','id'=>'sendsms', 'url' => [
											'action' => 'sendmass_sms'
										]]) ?>
										<div class="col-md-10 col-xl-12">									
											<div class="mb-3">
												<label class="form-label">Enter SMS Content</label>
												<?= $this->Form->control('template_body', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter SMS Content','type'=>'textarea']) ?>
											</div>										
										</div>
										<div class="col-md-10 col-xl-12">
											<div class="row">
												<div class="col-md-6 col-xl-6">
													<div class="mb-3">
														<label class="form-label">Send a SMS to</label>
														<?php
															$options = array(
																'0' => 'Select Filter Type',
															  'Seattle' => array(
																'1' => 'All leads',
																'2' => 'All leads with No Show',
																'3' => 'All leads with No Sale',
																'4' => 'All leads with cancelled appointments',
																'5' => 'All female members',
																'6' => 'All male members',
																'7' => 'All Active members',
																'8' => 'All Non Active members',
																'9' => 'Specific age group'
															  ),
															  'Denver' => array(
																'10' => 'All leads',
																'11' => 'All leads with No Show',
																'12' => 'All leads with No Sale',
																'13' => 'All leads with cancelled appointments',
																'14' => 'All female members',
																'15' => 'All male members',
																'16' => 'All Active members',
																'17' => 'All Non Active members',
																'18' => 'Specific age group'
															  ),
															  'Austin' => array(
																'19' => 'All leads',
																'20' => 'All leads with No Show',
																'21' => 'All leads with No Sale',
																'22' => 'All leads with cancelled appointments',
																'23' => 'All female members',
																'24' => 'All male members',
																'25' => 'All Active members',
																'26' => 'All Non Active members',
																'27' => 'Specific age group'
															  )
															);
														?>
														<?= $this->Form->select('filter_type',$options,['label' => false, 'class'=> 'form-control','id'=>'filter_type']) ?>
													</div>
												</div> 
												<div class="col-md-6 col-xl-6 age-group" style="display:none;">
													<label class="form-label">Members between the age of</label>
														<?php
															$age = array(
																'0,150' => 'any age',
																'19,20' => '19 and 20',
																'21,29' => '21 and 29',
																'30,39' => '30 and 39',
																'40,55' => '40 and 55',
																'56,65' => '56 and 65',
																'66,75' => '66 and 75',
																'76,86' => '76 and 86'
															);
														?>
													<?= $this->Form->select('age',$age,['label' => false, 'class'=> 'form-control','id'=>'age']) ?>
												</div>
												<div class="col-md-6 col-xl-6 male-age-group" style="display:none;">
													<label class="form-label">Male Members between the age of</label>
													<?= $this->Form->select('maleage',$age,['label' => false, 'class'=> 'form-control','id'=>'maleage']) ?>
												</div>
												<div class="col-md-6 col-xl-6 female-age-group" style="display:none;">
													<label class="form-label">Female Members between the age of</label>
													<?= $this->Form->select('femaleage',$age,['label' => false, 'class'=> 'form-control','id'=>'femaleage']) ?>
												</div>
											</div>
										</div>
										  <div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Send</button>
											<button type="button" class="btn btn-link">Cancel</button>
										  </div>
	                                    <?= $this->Form->end(); ?>
									</div>
								</div>
							</div>
							<div class="tab-pane card" id="tab-report">
								<div class="table-responsive ">
									<table class="table table-vcenter card-table">
										<thead>
											<tr>
												<th scope="col">Sr. Num</th>
												<th scope="col">
													<?= $this->Paginator->sort('Total Lead/Member') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Total Sent') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Total Pending') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Total Delivered') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Created') ?>
												</th>
											</tr>
										</thead>
										<tbody>										  
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
         
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
    $(function () {
	 	var $form = $("#sendsms");
   		$form.validate( {
		rules: {					
			template_body: {
				required:true
			}
		},
		messages:{		
			template_body: {
				required:"Please Enter Sms Content"
			}
		}		
		});
    });
</script>
<script type="text/javascript">
$(function() {
    $(document).on('change', '#filter_type', function(){
        if($(this).val() == '9' || $(this).val() == '18' || $(this).val() == '27'){
            $('.age-group').css('display', 'block');
            $('#age').removeAttr('disabled');
        }else{
            $('.age-group').css('display', 'none');
            $('#age').attr('disabled', 'disabled');
        }
		if($(this).val() == '6' || $(this).val() == '15' || $(this).val() == '24'){
            $('.male-age-group').css('display', 'block');
            $('#maleage').removeAttr('disabled');
        }else{
            $('.male-age-group').css('display', 'none');
            $('#maleage').attr('disabled', 'disabled');
        }
		if($(this).val() == '5' || $(this).val() == '14' || $(this).val() == '23'){
            $('.female-age-group').css('display', 'block');
            $('#femaleage').removeAttr('disabled');
        }else{
            $('.female-age-group').css('display', 'none');
            $('#femaleage').attr('disabled', 'disabled');
        }
    });  
});
</script>