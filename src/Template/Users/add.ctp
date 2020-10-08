  <div class="row">
    <div class="col-12">
      <?= $this->Form->Create($user, ['id'=> 'addUserForm', 'class'=>'card']) ?>
        <div class="card-header">
          <h4 class="card-title">Create New Staff</h4> </div>
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
                <label class="form-label">Password</label>
                <?= $this->Form->control('password', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter password']) ?>
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
                <?= $this->Form->select('status', [1=>'Active', 0 =>'In Active'], ['label' => false, 'class'=> 'form-control', 'empty' => '(Select)', 'default' => 1]) ?>
              </div>
            </div>
           
            <!-- <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Is ban?</label>
                <?php //$this->Form->select('is_ban', [1, 2], ['label' => false, 'class'=> 'form-control', 'empty' => '(Select)']) ?>
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
            <button type="submit" class="btn btn-primary ml-auto">Send data</button>
          </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
  </div>