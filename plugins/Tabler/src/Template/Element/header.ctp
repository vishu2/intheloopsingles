<header class="navbar navbar-expand-md navbar-dark top-navbar-menu">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=> 'dashboard', 'prefix'=>'admin'])?>" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
    <?php echo $this->Html->image('logo.png', ['alt' => 'logo', "class" => "navbar-brand-image"]); ?>
    </a>
    <div class="navbar-nav flex-row order-md-last">
	<a href="https://itlsingles.freshsales.io/" class="nav-link " target="_blank">
          <div class="d-none d-xl-block px-2 fresh_works">
           
            <div> <img src="<?php echo $this->Url->image('freshworks.png'); ?>" style="width: 24px;"> FreshWorks</div>
          </div>
        </a>
	  
	  <div class="nav-item dropdown d-none d-md-flex mr-3">
        
		<a href="#" class="nav-link px-0" data-toggle="dropdown" tabindex="-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
          <span class="badge bg-red"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
          <div class="card">
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
            </div>
          </div>
        </div>
      </div>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
          <span class="avatar" style="background-image: url(<?php echo $this->Url->image('default-user.png'); ?>)"></span>
          </span>
          <div class="d-none d-xl-block pl-2">
            <div><?= $userData->user_profile->first_name; ?></div>

            <div class="mt-1 small text-muted"><?= $userData->role->name ?></div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
           <a class="dropdown-item"  href="<?= $this->Url->build(['controller'=>'Users', 'action'=> 'change-password', 'prefix'=>'admin'])?>">
             <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><circle cx="12" cy="16" r="1"></circle><path d="M8 11v-4a4 4 0 0 1 8 0v4"></path></svg>
             </span>
             <span class="nav-link-title">
              Change Password
             </span>
          </a>

          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'logout', 'prefix'=>'admin'])?>">
             <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M7 12h14l-3 -3m0 6l3 -3"></path></svg>
             </span>
             <span class="nav-link-title">
              Sign out
             </span>
          </a>



          <!--<a class="dropdown-item" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><circle cx="12" cy="12" r="3" /></svg>
            Action
          </a>
          <a class="dropdown-item" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
            Another action
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Separated link</a>
          -->
        </div>
      </div>
    </div>
     <div class="collapse navbar-collapse" id='navbar-menu'>
        <div class="" id="main_navbar">
				<?php  //echo $this->request->getParam('controller'); echo $this->request->getParam('action'); ?>
                <ul class="navbar-nav">
					<?php if (($this->request->getParam('prefix')=='admin/seattle')OR($this->request->getParam('prefix')=='admin/denver')OR($this->request->getParam('prefix')=='admin/austin')) { ?>
					<li class="nav-item dropdown <?php echo (($this->request->getParam('prefix')=='admin/seattle'))? 'active' : 'inactive' ?>">
						<a class="nav-link dropdown-toggle" href="#" id="sidebar-users" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
							   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
							</span>
							<span class="nav-link-title">
								Seattle 
							</span>
						</a>
						<ul class="dropdown-menu " aria-labelledby="sidebar-users">
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin/seattle'])?>">Dashboard</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'allLead', 'prefix' => 'admin/seattle'])?>">All leads</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index', 'prefix' => 'admin/seattle'])?>">New leads</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'events', 'action'=> 'index', 'prefix' => 'admin/seattle'])?>">Events</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'travels', 'action'=> 'index', 'prefix' => 'admin/seattle'])?>">Travel Events</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member', 'prefix' => 'admin/seattle'])?>">Members</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown <?php echo (($this->request->getParam('prefix')=='admin/austin'))? 'active' : 'inactive' ?>">
						<a class="nav-link dropdown-toggle" href="#" id="sidebar-awards" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
							</span>
							<span class="nav-link-title">
								Austin
							</span>
						</a>
						<ul class="dropdown-menu " aria-labelledby="sidebar-awards">
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin/austin'])?>">Dashboard</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'allLead', 'prefix' => 'admin/austin'])?>">All leads</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index', 'prefix' => 'admin/austin'])?>">New leads</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'events', 'action'=> 'index', 'prefix' => 'admin/austin'])?>">Events</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'travels', 'action'=> 'index', 'prefix' => 'admin/austin'])?>">Travel Events</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member', 'prefix' => 'admin/austin'])?>">Members</a>
							</li>							
						</ul>
					</li>
					<li class="nav-item dropdown <?php echo (($this->request->getParam('prefix')=='admin/denver'))? 'active' : 'inactive' ?>">
						<a class="nav-link dropdown-toggle" href="#" id="sidebar-awards" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
							</span>
							<span class="nav-link-title">
								Denver
							</span>
						</a>
						<ul class="dropdown-menu " aria-labelledby="sidebar-awards">
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin/denver'])?>">Dashboard</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'allLead', 'prefix' => 'admin/denver'])?>">All leads</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index', 'prefix' => 'admin/denver'])?>">New Leads</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'events', 'action'=> 'index', 'prefix' => 'admin/denver'])?>">Events</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'travels', 'action'=> 'index', 'prefix' => 'admin/denver'])?>">Travel Events</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member', 'prefix' => 'admin/denver'])?>">Members</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if (($this->request->getParam('controller')=='Users')&&(($this->request->getParam('action')=='index') || ($this->request->getParam('action')=='add')||($this->request->getParam('action')=='edit'))) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Users')&&($this->request->getParam('action')=='index'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'index', 'prefix' => 'admin'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Staff
                            </span>
                        </a>
                    </li>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Users')&&($this->request->getParam('action')=='add'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                 Add New Staff
                            </span>
                        </a>
                    </li>
					<?php } ?>
					<!--<?php if (($this->request->getParam('prefix')=='admin')&&($this->request->getParam('controller')=='Users')&&(($this->request->getParam('action')=='member')||($this->request->getParam('action')=='memberdetail'))) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Users')&&(($this->request->getParam('action')=='member')||($this->request->getParam('action')=='memberdetail')))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Members
                            </span>
                        </a>
                    </li>
					<?php } ?>-->
					<?php if (($this->request->getParam('controller')=='Stories')) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Stories')&&($this->request->getParam('action')=='index'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'stories', 'action'=> 'index'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Stories
                            </span>
                        </a>
                    </li>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Stories')&&($this->request->getParam('action')=='add'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'stories', 'action'=> 'add'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                 Add New Story
                            </span>
                        </a>
                    </li>
					<?php } ?>
					<!--
					<?php if (($this->request->getParam('controller')=='Vendors')) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Vendors')&&($this->request->getParam('action')=='index'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'vendors', 'action'=> 'index'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Vendors
                            </span>
                        </a>
                    </li>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Vendors')&&($this->request->getParam('action')=='add'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'vendors', 'action'=> 'add'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                 Add New Vendor
                            </span>
                        </a>
                    </li>
					<?php } ?>
					-->
					<?php if (($this->request->getParam('controller')=='Attires')) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Attires')&&($this->request->getParam('action')=='index'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'attires', 'action'=> 'index'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Attires
                            </span>
                        </a>
                    </li>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Attires')&&($this->request->getParam('action')=='add'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'attires', 'action'=> 'add'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                 Add New Attire
                            </span>
                        </a>
                    </li>
					<?php } ?>
					<?php if (($this->request->getParam('controller')=='Transactions')) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='Transactions')&&($this->request->getParam('action')=='index'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Transactions', 'action'=> 'index'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Transactions
                            </span>
                        </a>
                    </li>
					<?php } ?>
					<?php if ((($this->request->getParam('controller')=='EmailTemplates')&&(($this->request->getParam('action')=='index')||($this->request->getParam('action')=='edit'))) || ($this->request->getParam('controller')=='Galleries')|| ($this->request->getParam('controller')=='LeadSources')|| (($this->request->getParam('controller')=='SmsTemplates')&&(($this->request->getParam('action')=='index')||($this->request->getParam('action')=='edit')))|| ($this->request->getParam('controller')=='Locations')|| ($this->request->getParam('controller')=='Links')|| ($this->request->getParam('controller')=='Vendors')|| ($this->request->getParam('controller')=='Hours')|| ($this->request->getParam('controller')=='FooterContact') ) { ?>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='EmailTemplates'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'email-templates', 'action'=> 'index'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All Email Templates
                            </span>
                        </a>
                    </li>
					<li class="nav-item <?php echo (($this->request->getParam('controller')=='SmsTemplates'))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'sms-templates', 'action'=> 'index'])?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                All SMS Templates
                            </span>
                        </a>
                    </li>
					<li class="nav-item dropdown <?php echo (($this->request->getParam('controller')=='Galleries'))? 'active' : 'inactive' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Galleries
                            </span>
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="sidebar-awards">
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'galleries', 'action'=> 'index'])?>">All Galleries</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'galleries', 'action'=> 'add'])?>">Add Gallery</a>
							</li>
						</ul>                       
                    </li> 
					<li class="nav-item dropdown <?php echo (($this->request->getParam('controller')=='LeadSources'))? 'active' : 'inactive' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Lead Source
                            </span>
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="sidebar-awards">
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'LeadSources', 'action'=> 'index'])?>">All Lead Source</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'LeadSources', 'action'=> 'add'])?>">Add Lead Source</a>
							</li>
						</ul>                       
                    </li>
             
					<li class="nav-item dropdown <?php echo (($this->request->getParam('controller')=='Locations')|| ($this->request->getParam('controller')=='Links')|| ($this->request->getParam('controller')=='Vendors')|| ($this->request->getParam('controller')=='Hours')|| ($this->request->getParam('controller')=='FooterContact'))? 'active' : 'inactive' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Extra Settings
                            </span>
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="sidebar-awards">
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'locations', 'action'=> 'index'])?>">Contact Details</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'links', 'action'=> 'index'])?>">Social Media Links</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'hours', 'action'=> 'index'])?>">Business Hours</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'footer-contact', 'action'=> 'index'])?>">Footer Contact Details</a>
							</li>
							<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'vendors', 'action'=> 'index', 'prefix' => 'admin'])?>">Vendors</a>
							</li>
							<!--<li>
								<a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'attires', 'action'=> 'index', 'prefix' => 'admin'])?>">Attires</a>
							</li>-->
						</ul>                       
                    </li>
					<?php } ?>
					
					<?php if (($this->request->getParam('controller')=='EmailTemplates')&&(($this->request->getParam('action')=='massEmail')||($this->request->getParam('action')=='massEmailEdit')||($this->request->getParam('action')=='bulkMessage'))) { ?>
					<li class="nav-item dropdown <?php  echo (($this->request->getParam('controller')=='EmailTemplates')&&(($this->request->getParam('action')=='massEmail')))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'EmailTemplates', 'action'=> 'massEmail'])?>" id="navbarUserDropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Mass Email Template
                            </span>
                        </a>
                    </li>
					<?php } ?>
					
					<?php if (($this->request->getParam('controller')=='SmsTemplates')&&(($this->request->getParam('action')=='massSms'))) { ?>
					<li class="nav-item dropdown <?php  echo (($this->request->getParam('controller')=='SmsTemplates')&&(($this->request->getParam('action')=='massSms')))? 'active' : 'inactive' ?>">
                        <a class="nav-link" href="<?= $this->Url->build(['controller'=>'SmsTemplates', 'action'=> 'massSms'])?>" id="navbarUserDropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Mass Sms Template
                            </span>
                        </a>
                    </li>
					<?php } ?>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"></path></svg>
                            </span>
                            <span class="nav-link-title">
                                Locations
                            </span>
                        </a>

                        <ul class="dropdown-menu  " aria-labelledby="navbarUserDropdown">

                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="sidebar-users" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Seattle
                                    </span>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="sidebar-users">
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index'])?>">New leads</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Events</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Travel Events</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="sidebar-awards" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Austin
                                    </span>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="sidebar-awards">
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index'])?>">New leads</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Events</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Travel Events</a>
                                    </li>
                                    
                                </ul>
                            </li>


  

                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="sidebar-awards" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Denver
                                    </span>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="sidebar-awards">
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index'])?>">New Leads</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Events</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Travel Events</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Staff
                            </span>
                        </a>

                        <ul class="dropdown-menu  " aria-labelledby="navbarUserDropdown">

                            <li class="nav-item">
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'index'])?>" >
                                       <i class="fa fa-users pr-2"></i> All Staff
                                </a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>" >
                                       <i class="fa fa-user-plus pr-2"></i> Add New Staff
                                </a>
                                
                            </li>

                        </ul>


                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z"></path>
                                   <circle cx="12" cy="7" r="4"></circle>
                                   <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Members
                            </span>
                        </a>

                        <ul class="dropdown-menu  " aria-labelledby="navbarUserDropdown">

                            <li class="nav-item">
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member'])?>" >
                                      <i class="fa fa-users pr-2"></i>   All Members
                                </a>
                                
                            </li>
                            

                        </ul>

                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><line x1="3" y1="6" x2="3" y2="19"></line><line x1="12" y1="6" x2="12" y2="19"></line><line x1="21" y1="6" x2="21" y2="19"></line></svg>
                            </span>
                            <span class="nav-link-title">
                                Stories
                            </span>
                        </a>

                        <ul class="dropdown-menu  " aria-labelledby="navbarUserDropdown">

                            <li class="nav-item">
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'stories', 'action'=> 'index'])?>" >
                                        All Stories
                                </a>
                                
                            </li>
                            

                        </ul>

                        
                    </li>
                    <?php
                        $sactive = '';
                        if((($this->request->getParam('controller') == 'EmailTemplates') && ($this->request->getParam('action')=='index') ) OR ($this->request->getParam('controller')=='EmailTemplates') OR ($this->request->getParam('controller')=='JobTypes') OR ($this->request->getParam('controller')=='Materials') OR ($this->request->getParam('controller')=='Rates') OR ($this->request->getParam('controller')=='RateTypes') OR ($this->request->getParam('controller')=='RateChargeTypes')) {
                            $sactive = 'active';

                        }
                    ?>
                    <li class="nav-item <?= $sactive;?> dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </span>
                            <span class="nav-link-title">
                                Settings
                            </span>
                        </a>

                        <ul class="dropdown-menu  " aria-labelledby="navbarUserDropdown">
                            
                            <li class="nav-item">
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'email-templates', 'action'=> 'index'])?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg>
                                    </span>
                                    <span class="nav-link-title">
                                       All Email Templates
                                    </span>
                                </a>
                               
                            </li>

                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="sidebar-awards" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="11" r="3"></circle><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Galleries
                                    </span>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="sidebar-awards">
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'galleries', 'action'=> 'index'])?>">All Galleries</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'galleries', 'action'=> 'add'])?>">Add Gallery</a>
                                    </li>
                                </ul>
                            </li>
	

                           
	
                            
                        </ul>
                    </li>-->

                </ul>

          
        </div>
    </div>
  </div>
</header>