<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
<?php $this->TinymceElfinder->defineElfinderBrowser()?>
<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Members
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'new_member'])?>">Add</a>
		</div>
	</div>
</div>
<div class="collapse <?php echo (!empty($this->request->getQuery('action')) ? 'show' : '') ?>" data-actionCollapse='' id="collapseSearch">
	<div class="card card-body">
		<?php $squery = $this->request->getQueryParams(); ?>
		<?= $this->Form->Create(null, ['type' => 'get']) ?>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="name">Name</label>
				<?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Member Name', 'value' => @$squery['name']]) ?>
			</div>
			<div class="form-group col-md-3 col-lg-2 mt-4"> 
			<a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'member'])?>" class="btn btn-primary ">Clear</a>
			<button type="submit" class="btn btn-primary " name='action'>Search</button>
			</div>
		</div>
		<?= $this->Form->end(); ?>
	</div>
</div>
<div class="box">
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table table-striped">
        <thead>
          <tr>
            <th scope="col">Sr. Num</th>
            <th scope="col">
                Member avatar
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('user_profile.first_name', 'First Name') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('user_profile.last_name', 'Last Name') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('email') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('status') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('created') ?>
            </th>
            <th scope="col" class="actions">
                <?= __('Actions') ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $i=$this->Paginator->counter('{{start}}'); foreach ($users as $user): ?>
              <tr>
                  <td>
                      <?= $i ?>
                  </td>
                  <td>
                    <?= $this->Html->image((!empty($user->user_profile->profile_image) ? '../files/member-profile/'.$user->user_profile->profile_image : 'default-user.png'), ['fullBase' => true, 'height'=>'70px',  'width'=>'70px','class'=>'rounded-circle'])?>
                     
                  </td>
                  <td>
                      <?= h($user->user_profile->first_name) ?>
                  </td>
                  <td>
                      <?= h($user->user_profile->last_name) ?>
                  </td>
                  <td class="text-muted">
                      <?= h($user->email) ?>
                  </td>
                  <td class="text-muted">
                    <label class="form-check form-switch">
                      <input class="form-check-input staff-status" data-id="<?= $user->id; ?>" type="checkbox" <?= ($user->status == 1) ? 'checked' : ''?>>
                    </label>

                  </td>
                  <td class="text-muted">
                      <?= $user->modified ?>
                  </td>
                  <td class="text-muted">
                    <?php //$this->Html->link('<span class="fa fa-plus edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'eventRegistration', base64_encode($user->id)], ['escape' => false, 'title' => __('Event Registration')]) ?> 
					  
					  <?= $this->Html->link('<span class="fa fa-eye edit_btn"></span><span class="sr-only">' . __('Member Details') . '</span>', ['action' => 'memberdetail', base64_encode($user->id)], ['escape' => false, 'title' => __('Member Details')]) ?>
						<a href="#" title="Send Email" class="email" data-email="<?= $user->email;?>" >
							<span class="fa fa-envelope edit_btn"></span>
						</a>
						<a href="#" title="Send SMS" class="sms" data-mobile="<?= $user->user_profile->mobile;?>">
							<span class="fa fa-phone edit_btn"></span>
						</a>
						<?= $this->Html->link('<span class="fa fa-pencil edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit_member', base64_encode($user->id)], ['escape' => false, 'title' => __('Edit')]) ?>
						<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete_member', $user->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $user->id),'title' => __('Delete')]) ?>
                   </td>
              </tr>			  
				
              <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
    <?php echo $this->element('pagination'); ?>
</div>
<!--Email Modal-->
	<div class="modal modal-blur fade" id="email" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Send Email</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						  <path stroke="none" d="M0 0h24v24H0z"/>
						  <line x1="18" y1="6" x2="6" y2="18" />
						  <line x1="6" y1="6" x2="18" y2="18" />
					   </svg>
					</button>
				</div>
				<?= $this->Form->Create(null, ['url' => ['controller' => 'users','action' => 'memberEmail'],  'class'=>'convert-lead']) ?>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">																	
							<div class="row">
								 <?= $this->Form->control('users.email', ['label' => false, 'class'=> 'form-control ignore', 'type' => 'hidden', 'required' => true]) ?>
								<div class="col-md-12 col-lg-12 col-xl-12">
									<div class="mb-3">
									   <label class="form-label">Subject</label>
									   <?= $this->Form->control('subject', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Subject', 'required' => true]) ?>
									</div>
								</div>
								<div class="col-md-12 col-lg-12 col-xl-12">
									<div class="mb-3">
									   <label class="form-label">Email Content</label>
									   <?= $this->Form->control('email-content', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Email Content', 'type'=>'textarea', 'required' => true]) ?>
									</div>
								</div>
							</div>
							<div class="row d-flex">
								<div class="d-flex">
									<button type="submit" class="btn btn-primary">Send</button>
									<button type="button" class="btn btn-link addLocation-modal-close" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>									 									 
														
						</div>
					</div>
				</div>
				<?= $this->Form->end(); ?>						
			</div>
		</div>
	</div>
<!--Email Modal End-->
<!--SMS Modal-->
	<div class="modal modal-blur fade" id="sms" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Send SMS</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						  <path stroke="none" d="M0 0h24v24H0z"/>
						  <line x1="18" y1="6" x2="6" y2="18" />
						  <line x1="6" y1="6" x2="18" y2="18" />
					   </svg>
					</button>
				</div>
				<?= $this->Form->Create(null, ['url' => ['controller' => 'users','action' => 'sendTestSms'],  'class'=>'convert-lead']) ?>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">																	
							<?= $this->Form->control('user_profile.mobile', ['label' => false, 'class'=> 'form-control ignore', 'name' =>'mobile', 'type' => 'hidden', 'required' => true]) ?>
							<div class="row">
								<div class="col-md-12 col-lg-12 col-xl-12">
									<div class="mb-3">
									   <label class="form-label">SMS Content</label>
									   <?= $this->Form->control('sms-content', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Sms Content', 'type'=>'textarea', 'required' => true]) ?>
									</div>
								</div>
							</div>
							<div class="row d-flex">
								<div class="d-flex">
									<button type="submit" class="btn btn-primary ">Send</button>
									<button type="button" class="btn btn-link addLocation-modal-close" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>									 									 
						</div>
					</div>
				</div>
				<?= $this->Form->end(); ?>					
			</div>
		</div>
	</div>
<!--SMS Modal End-->
<script>
	$(".staff-status").on("change",function() {
        var $this = $(this);
        var status = $(this).prop('checked');
        var id = $(this).attr('data-id');
        var target_url = "users/ajaxMemberStatus";

        $.ajax({
          type: "POST",
          url: target_url,
          data: {
            "status": ((status === true) ? 1 : 0),
            "id": id
          },
          success: function(msg) {
            var json = JSON.parse(msg);
            //console.log(json);
            if(json.status == 'success'){
             swal({
                icon: 'success',
                title: 'Success',
                text: json.message,
              });
            }else if(json.status == 'error'){
                swal({
                icon: 'error',
                title: 'Oops...',
                text: json.message,
              }).then(()=>{
                $this.prop('checked', false);
                });
            }
          }
        });
      });
	  	
</script>

<script>
$(function() {
    $(document).on('click', '.email', function(){
      var $this = $(this);
      $("#users-email").val($this.attr('data-email'));
      $("#email").modal('show');
    });
});
$(function() {
    $(document).on('click', '.sms', function(){
      var $this = $(this);
      $("#user-profile-mobile").val($this.attr('data-mobile'));	
      $("#sms").modal('show');
    });
});

</script>
