<div class="nav-tabs-custom" id="bulKmsg"> 
    <ul class="nav nav-tabs">
        <li class=" nav-item"><a href="#mass" data-toggle="tab" class="nav-link active">Send Mass Email</a></li>
        <li class="nav-item"><a href="#test" data-toggle="tab" class="nav-link ">Send Test Email</a></li>
    </ul>
    <div class="tab-content bg-white">       
        <div class="tab-pane active" id="mass">
			<div class="col-12">  <!-- col-8 mx-auto  -->
				<?= $this->Form->Create($emailTemplate, [ 'class'=>'card border-0 rounded-0 ']) ?>
				<div class="card-header ">
					<h4 class="card-title"><?= $emailTemplate->subject; ?></h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-10 col-xl-12">
							<div class="row">
								<div class="col-md-6 col-xl-6">
									<div class="mb-3">
										<label class="form-label">Send an Email to</label>
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
						
					</div>
				</div>
				<div class="card-footer text-right">
					<div class="d-flex">
						<button type="submit" class="btn btn-primary ">Send</button>
						<button type="button" class="btn btn-link">Cancel</button>
					</div>
				</div>
				<?= $this->Form->end(); ?>
			</div>
        </div>
        <div class="tab-pane " id="test">
			<div class="col-12">  
				<?= $this->Form->Create($emailTemplate, [ 'class'=>'card border-0 rounded-0', 'url' => [
					'controller' => 'EmailTemplates',
					'action' => 'send_test_email'
					]]) ?>
				<div class="card-header">
					<h4 class="card-title"><?= $emailTemplate->subject; ?></h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6">						
							<div class="mb-3">
								<label class="form-label">Send a test email to </label>
								<?= $this->Form->control('to', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Email']) ?>
							</div>						
						</div>
					</div>
				</div>
				<div class="card-footer text-right">
					<div class="d-flex">
						<button type="submit" class="btn btn-primary ">Send Test Email</button>
						<button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
					</div>
				</div>
				<?= $this->Form->end(); ?>
			</div>
        </div>
    </div>
</div>
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