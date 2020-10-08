<?php /* <div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">
        Employees
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ml-auto d-print-none">
      
      <a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'employees', 'action'=> 'add'])?>">Add</a>
  <a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'employees', 'action'=> 'add'])?>">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z"></path>
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
  </a>
  <!--<a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block" data-toggle="modal" data-target="#modal-report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Create new report
      </a>
      <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>--></div>
  </div>
  </div> */ ?>

  <div class="row">
    <div class="col-12">
      <?= $this->Form->Create($user, ['id'=> 'editUserForm', 'class'=>'card']) ?>
        <div class="card-header">
          <h4 class="card-title">Edit User</h4> </div>
        <div class="card-body">
          <div class="row">
            
            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">First Name</label>
                <?= $this->Form->control('user_profile.first_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter first name']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <?= $this->Form->control('user_profile.last_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter last name']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <?= $this->Form->control('email', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'you@comany.com']) ?>
              </div>
            </div>

            
            
             <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Role</label>
                <?= $this->Form->select('role_id', $roles, ['label' => false, 'class'=> 'form-control']) ?>
              </div>
            </div>

           
            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Phone</label>
                <?= $this->Form->control('user_profile.phone', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Please Enter Phone Number']) ?>
              </div>
            </div>

           
            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Mobile</label>
                <?= $this->Form->control('user_profile.mobile', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Please Enter Mobile Number']) ?>
              </div>
            </div>

           
            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Address</label>
                <?= $this->Form->control('user_profile.address', ['label' => false, 'class'=> 'form-control']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Status</label>
                <?= $this->Form->select('status', [1=>'Active' , 0=>'In Active'], ['label' => false, 'class'=> 'form-select']) ?>
              </div>
            </div>
           
            <!-- <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Is ban?</label>
                <?php //$this->Form->select('is_ban',  [1=>'Banned', 2=>'Not Banned'],['label' => false, 'class'=> 'form-select']) ?>
              </div>
            </div>
             <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Ban reason</label>
                <?php //$this->Form->control('ban_reason', ['label' => false, 'class'=> 'form-control']) ?>
              </div>
            </div> -->
            

          </div>
        </div>
        <div class="card-footer text-right">
          <div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Update</button>
          </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
  </div>