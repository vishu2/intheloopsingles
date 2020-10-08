<section class="inner_banner signin_bnr">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Sign in</h3>
		</div>
	</div>
</section>
<section class="signin_sec">
	
	<div class="container">
		
		<div class="row justify-content-end">
			<div class="col-md-5 align-self-center">
				<img src="img/logo.png" alt="" class="img-fluid  mb-3" width="180px">
				<h2 class="login-left-content">Have Fun.<span class="d-block"> Meet Singles.</span> Repeat.</h2>
			</div>
			<div class="col-md-6">
				<div class="sign_in">
					<h2>I'M A MEMBER</h2>
					<?= $this->Flash->render(); ?>
					<?php echo $this->Form->create(null, ['id' => 'memberLoginForm']); ?>
					  <div class="form-group">
					  	<?php echo $this->Form->control('email', ['label' => false, 'label' => false,'class' => 'form-control', 'placeholder'=> "Email ID"]); ?>
						
					  </div>
					  <div class="form-group">
						  <?php echo $this->Form->control('password', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder'=> "password"]); ?>
					  </div>
					  <div class="d-flex align-items-center justify-content-between">
						  <!-- <div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Remember Me</label>
						  </div> -->
						  <a data-target="#myModal" data-toggle="modal" class="MainNavText" id="MainNavHelp" 
							href="#myModal">(Lost Password?)</a>
					  </div>
					  
					  <button type="submit" class="btn">Sign In</button>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
	
</section>
	<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered forget_modal">
			<div class="modal-content sign_in px-0 pt-3">
                <div class="modal-header">
					<h2 class="mb-0">Reset Password </h2> 
					<button type="button" class="close" data-dismiss="modal">&times;</button>                    
                </div>
                <div class="modal-body px-5 pt-4">
                	<p class="text-muted pb-3">Enter your email to reset your password</p>
					<?php echo $this->Form->create(null, ['url' => [
				'controller' => 'Users',
				'action' => 'forgot-password'
			]]); ?>
					<div class="form-group">
					  	<?php echo $this->Form->control('email', ['label' => false, 'label' => false,'class' => 'form-control', 'placeholder'=> "Email ID"]); ?>						
					</div>
				</div>
					 <div class="modal-footer border-top-0">
					<button type="submit" class="btn mt-0 rounded mx-5">Submit</button>
					<?php echo $this->Form->end(); ?>
				</div>              
            </div>
        </div>
    </div>
   