<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'home']); ?>"> <?= $this->Html->image('logo.png'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">

	  <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'dashboard', 'prefix' => 'admin'])?>">Dashboard</a></li>
	  
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'eventListing') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'eventListing'])?>">Events</a></li>
	  
	  <li class="nav-item <?php echo (($this->request->getParam('action') == 'travelListing') ? 'active' : ''); ?>"><a class="nav-link" href="<?= $this->Url->build(['action' => 'travelListing'])?>">Travel</a></li>
	  
	  
	  <li class="nav-item dropdown user_dropdwn">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			 Locations
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<div class="row align-items-center9891125146">
				<div class="col-12">
					<a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal', base64_encode(1)])?>">Seattle</a>
					<a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal', base64_encode(2)])?>">Denver</a>
					<a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'eventscal', base64_encode(3)])?>">Austin</a>
				</div>
			</div>
		</div>
	</li>  
	</ul>

		<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown user_dropdwn">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<span class="profile_pic"><?= $this->Html->image((!empty($user->user_profile->profile_image) ? '../files/member-profile/'.$user->user_profile->profile_image : 'default-user.png'), ['fullBase' => true])?></span> <?= ($user->role_id == 0) ? 'Admin' : $user->user_profile->first_name; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<div class="row align-items-center9891125146">
							
								<div class="col-7 balance">
									<h4><?= $user->user_profile->first_name.' '.$user->user_profile->last_name; ?></h4>
									
									<p>Event Credit Balance:</p>
									<span>$$$$</span>
								</div>
							
							<div class="col-5">
								 
								<?php 
									$myaccount = $this->Url->build(['controller' => 'users', 'action' => 'dashboard', 'prefix' => 'admin']);
								?>
								<a class="dropdown-item" href="<?= $myaccount; ?>">My Account</a>
								<a class="dropdown-item log_out" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>"><img src="img/log_out.svg" alt="">Log Out</a>
							</div>
						</div>
					</div>
				</li>
			</ul>

  </div>
</nav>

	
