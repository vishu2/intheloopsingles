<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Attendee List
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'events', 'action'=> 'add'])?>">Add</a>
		</div>
	</div>
</div>

<div class="box">
	<div class="card" style="height:460px;overflow:scroll;">
		<div class="table-responsive">
			<table class="table table-vcenter card-table">
				<thead>
					<tr>
						<th scope="col">Sr. Num</th>
						<th scope="col">
							<?= $this->Paginator->sort('Email') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Full Name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Age') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Gender') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Phone') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Mobile') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Address') ?>
						</th>
					</tr>
				</thead>
				<tbody>
				   <?php $i=1; foreach ($events->event_registrations as $event_user): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= $event_user->user->email ?>
						</td>
						<td>
							<?= $event_user->user->user_profile->first_name.' '.$event_user->user->user_profile->last_name ?>
						</td>
						<td>
							<?php 
								$dob = $event_user->user->user_profile->dob;
								$today = date("Y-m-d");
								$diff = date_diff(date_create($dob), date_create($today));
								echo $diff->format('%y');
							?>
						</td>
						<?php if (($event_user->user->user_profile->sex)=='1') {  ?>
						<td> Male  </td>
						<?php } else if (($event_user->user->user_profile->sex)=='2') { ?>
						<td style="color:#ff00ff"> Female  </td>
						<?php } else { ?>
						<td>   </td>
						<?php } ?>
						<td>
							<?= $event_user->user->user_profile->phone ?>
						</td>
						<td>
							<?= $event_user->user->user_profile->mobile ?>
						</td>
						<td>
							<?= $event_user->user->user_profile->address ?>
						</td>
					</tr>
					<?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>	
</div>
<div class="card col-12" id="" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="" role="document">
      <div class="">
			<div class="modal-header">
				<h5 class="modal-title">Send Email/SMS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
					  <path stroke="none" d="M0 0h24v24H0z"/>
					  <line x1="18" y1="6" x2="6" y2="18" />
					  <line x1="6" y1="6" x2="18" y2="18" />
				   </svg>
				</button>
			</div> 
			<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
			<?php $this->TinymceElfinder->defineElfinderBrowser()?>							 
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
							<ul class="nav nav-tabs nav-fill" data-toggle="tabs">
								<li class="nav-item">
									<a href="#tab-sms" class="nav-link active" data-toggle="tab">
										1. SMS Template
									</a>
								</li>
								<li class="nav-item">
									<a href="#tab-email" class="nav-link" data-toggle="tab">
										2. Email Template
									</a>
								</li>								
							</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-sms">
									<?= $this->Form->Create(null, [  ]) ?>	
									<div class=" mt-4">
										<div class="col-xl-12">				
												<div class="mb-3">
												<label class="form-label">Enter SMS Content</label>
												<?= $this->Form->control('template_body', ['label' => false,'type'=>'textarea', 'class'=> 'form-control', 'placeholder' => 'Enter Content']) ?>
												</div>				
										</div>						   
									</div>
									<div class="d-flex">
										<button type="submit" class="btn btn-primary ">Send</button>
										<button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
									</div>
									 <?= $this->Form->end(); ?>
							</div>
							<div class="tab-pane" id="tab-email">
								<?= $this->Form->Create(null, [  ]) ?>	
								<div class="row mt-4">
									<div class="col-xl-6">				
											<div class="mb-3">
											<label class="form-label">Enter Subject</label>
											<?= $this->Form->control('subject', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Subject']) ?>
											</div>				
									</div>
									<div class="col-xl-12">				
											<div class="mb-3">
											<label class="form-label">Email Template Body</label>
											<?= $this->Form->control('template_body', ['label' => false,'type'=>'textarea', 'class'=> 'form-control email', 'placeholder' => 'Enter Template Body']) ?>
											</div>				
									</div>						   
								</div>
								<div class="row d-flex">
			                       <div class="d-flex">
			                         <button type="submit" class="btn btn-primary ">Send</button>
										<button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
			                      </div>
		                   		</div>
								 <?= $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>        
		</div>
	</div>

</div>
<script>
$(document).ready(function(){
tinymce.init({
        file_browser_callback : elFinderBrowser,
        selector: '.email',
        height: 300,
        theme: 'modern',
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        plugins: [
        // 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'image code',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        // 'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar: 'undo redo | image code',
        //images_upload_url: '<?php echo $this->Url->build('/admin/cms-pages/upload'); ?>',
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        // image_advtab: true,
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