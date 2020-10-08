<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
<?php $this->TinymceElfinder->defineElfinderBrowser()?>	
<div class="box">
	<div class="col-lg-12 row">
	<div class="card col-lg-7"> <!--  mx-auto -->
		<div  id="memBerDetails" class="pb-5">
			<div class="py-3 col-12 ">
				<h3 class="card-header">Member Information</h3></div>
			<div class="form-group row ">
				<div class="col-lg-12 text-center mb-3 mt-2">
					<?= $this->Html->image('/files/member-profile/'.$user->user_profile->profile_image, ['fullBase' => true, 'height'=>'100px','width'=>'100px','class'=>'memeber-img img-fluid ']); ?>
				</div>
			</div>
			<div class="form-group row">				
				<div class="col-lg-6 col-xl-6">
					<label >First Name</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->first_name) ?>">
					<i class="fa fa-user pr-1"></i>
					</div>
				</div>							
				<div class="col-lg-6 col-xl-6">
					<label >Last Name</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->last_name) ?>">
					<i class="fa fa-user pr-1"></i>
					</div>
				</div>
			</div>
			<div class="form-group row">				
				<div class="col-lg-6 col-xl-6">
					<label >Email</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->email) ?>">
					<i class="fa fa-envelope"></i>
					</div>
				</div>							
				<div class="col-lg-3 col-xl-3">
					<label >Phone</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->phone) ?>">
					<i class="fa fa-phone"></i>
					</div>
				</div>
				<div class="col-lg-3 col-xl-3">
					<label >Mobile</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->mobile) ?>">
					<i class="fa fa-phone"></i>
					</div>
				</div>
			</div>
			<div class="form-group row">				
				<div class="col-lg-3 col-xl-3">
					<label >DOB</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->dob) ?>">
					<i class="fa fa-calendar"></i>
					</div>
				</div>							
				<div class="col-lg-3 col-xl-3">
					<label >Sex</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->sex) ?>">
					<i class="fa fa-user pr-1"></i>
					</div>
				</div>						
				<div class="col-lg-6 col-xl-6">
					<label >Address</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->address) ?>">
					<i class="fa fa-map-pin"></i>
					</div>
				</div>
			</div>
			<div class="form-group row">			
				<div class="col-lg-6 col-xl-6">
					<label>City</label>
					<div class="input_cover">
						<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->city) ?>">
						<i class="fa fa-paper-plane"></i>
					</div>
				</div>							
				<div class="col-lg-6 col-xl-6">
					<label >State</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->state_id) ?>">
					<i class="fa fa-map"></i>
					</div>
				</div>
			</div>
			<div class="form-group row">			
				<div class="col-lg-6 col-xl-6">
					<label >Zip</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->zip) ?>">
					<i class="fa fa-map"></i>
					</div>
				</div>						
				<div class="col-lg-6 col-xl-6">
					<label >Credit Balance</label>
					<div class="input_cover">
					<input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?= h($user->user_profile->credit_balance) ?>">
					<i class="fa fa-dollar"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card col-lg-5"> <!--  mx-auto -->
		<div  id="" class="pb-5">
			<div class="py-3 col-12 ">
				<h3 class="card-header">Notes</h3></div>
			<div class="form-group row ">
				<div class="col-lg-12 text-center mb-3 mt-2">	
					<?php foreach ($memberNotes as $memberNote): ?>
						<p><?= $memberNote->notes ?></p>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="card col-lg-12"> <!--  mx-auto -->
		<div  id="" class="pb-5">
			<?= $this->Form->Create(null, [ 'url' => [
				'controller' => 'MemberNotes',
				'action' => 'add'
			]]) ?>
			<div class="py-3 col-12 ">
				<h3 class="card-header">Add Notes</h3>
			</div>
			<input type="hidden" name="user_id" value="<?= h($user->id)  ?>">
			<div class="form-group">
				<div class="col-lg-12 text-center mb-3 mt-2">
					<?= $this->Form->control('notes', ['label' => false, 'class'=> 'form-control', 'type' => 'textarea']) ?>
				</div>
			</div>
			<div class="card-footer text-right">
				<div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
					<button type="submit" class="btn btn-primary ml-auto">Save</button>
				</div>
			</div>
			<?= $this->Form->end(); ?>	
		</div>
	</div>
	</div>
</div>
<script>
/*$(document).ready(function(){
tinymce.init({
        file_browser_callback : elFinderBrowser,
        selector: 'textarea',
        height: 350,
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
        '//www.tinymce.com/css/codepen.min.css'
        ],
        
    });
});*/
</script>