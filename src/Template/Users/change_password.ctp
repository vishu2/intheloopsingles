<div class="my-3 my-md-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?= $this->Form->Create(null, ['id'=> 'changePasswordForm', 'class'=>'card']) ?>
            <div class="card-header">
                <h4 class="card-title">Change Password</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-6 col-xl-12">

                                <div class="mb-3">
                                    <label class="form-label">Old Password</label>
                                    <?= $this->Form->control('old_password', ['type'=> 'password', 'label' => false, 'class'=> 'form-control', 'placeholder' => 'Please enter your current password', 'required'=> true]) ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <?= $this->Form->control('password', ['type'=> 'password','label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter your new password', 'required'=> true]) ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <?= $this->Form->control('confirm_password', ['type'=> 'password','label' => false, 'class'=> 'form-control', 'placeholder' => 'Confirm your password', 'required'=> true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary ">Update</button>
                    <button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
                </div>
            </div>
            <?= $this->Form->end(); ?>
            </form>
        </div>
    </div>
</div>