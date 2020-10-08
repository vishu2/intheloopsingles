<section class="inner_banner signin_bnr">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Change Password</h3>
		</div>
	</div>
</section>
<section class="product_details-forget">
	<div class="overlay"></div>
	<div class="container my-5">
		<div class="row justify-content-end ">
			<!-- <div class="col-md-5 align-self-center">
				<img src="img/logo.png" alt="" class="img-fluid  mb-3" width="180px">
				<h2 class="login-left-content">Have Fun.<span class="d-block"> Meet Singles.</span> Repeat.</h2>
			</div> -->
			<div class="col-md-5 mx-auto my-5">
				<div class="sign_in border-bottom-0 text-center">
					<h2 class=" border-0 mb-0 pb-0">Change Password</h2><span class="sec_head d-block"></span>
					<?= $this->Flash->render(); ?>
					<?php echo $this->Form->create(null, ['id'=>'changepassword']); ?>
					  <div class="form-group">
					  	<?php echo $this->Form->control('password', ['label' => false, 'label' => false,'class' => 'form-control', 'placeholder'=> "Password",'id'=>'password']); ?>
						
					  </div>
					  <div class="form-group">
						  <?php echo $this->Form->control('confirm_password', ['label' => false, 'div' => false, 'class' => 'form-control', 'placeholder'=> "Confirm Password",'type'=>'password']); ?>
					  </div>
					 
					  
					  <button type="submit" class="btn submit_btn mt-3">Submit</button>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
  	<script>
		$(document).ready(function() {
		$("#changepassword").validate( {
		rules: {					
			password: {
				required:true,
				minlength: 6
			},
			confirm_password: {
				required:true,
				minlength: 6,
				 equalTo: "#password"
			}
		},
		messages:{		
			password: {
				required:"Please Enter Password",
				minlength: "Enter min. 6 letters"
			},
			confirm_password: {
				required:"Please Enter Password",
				 minlength: "Enter min. 6 letters",
				 equalTo: "Passwords doesnot Match"
			}
		}		
		});
		});
	</script>