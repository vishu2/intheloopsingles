<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <?php echo $this->Html->image('logo.w.png', ['alt' => 'tabler logo', "class" => "h-10"]); ?>
                </div>
                <?php echo $this->Form->create('User', ['id' => 'loginForm', 'class'=> 'card']); ?>
         
                    <div class="card-body p-6">
                        <div class="card-title">Login to your account</div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <?php echo $this->Form->control('username', ['label' => false, 'class' => 'form-control', 'placeholder'=> "username"]); ?>

                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Password
                                <!--<a href="./forgot-password.html" class="float-right small">I forgot password</a>-->
                            </label>
                            <?php echo $this->Form->control('password', ['label' => false, 'class' => 'form-control', 'placeholder'=> "password"]); ?>
                        </div>
                        <!--<div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" />
                                <span class="custom-control-label">Remember me</span>
                            </label>
                        </div>-->
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                    </div>
                <?= $this->Form->end(); ?>
               
            </div>
        </div>
    </div>
</div>