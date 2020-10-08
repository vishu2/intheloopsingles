			<nav id="sidebar" class="">
            <!-- <div class="sidebar-header">
                <h3> Sidebar</h3>
                <strong>BS</strong>
            </div> -->

            <ul class="list-unstyled components">
			<li class="sub-menu <?php  echo (($this->request->getParam('prefix')=='admin')&&($this->request->getParam('controller')=='Users')&&($this->request->getParam('action')=='dashboard'))? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'dashboard', 'prefix' => 'admin'])?>"> <em class="fa fa-tachometer"></em><span>Dashboard</span></a>
            </li>
			<li class="sub-menu <?php  echo (($this->request->getParam('prefix')=='admin/austin')OR($this->request->getParam('prefix')=='admin/seattle')OR($this->request->getParam('prefix')=='admin/denver'))? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'index', 'prefix' => 'admin/austin'])?>"> <em class="fa fa-map-marker"></em><span>Locations</span></a>
            </li>
			<li class="sub-menu <?php  echo (($this->request->getParam('controller')=='Users')&&(($this->request->getParam('action')=='index') || ($this->request->getParam('action')=='add')||($this->request->getParam('action')=='edit')))? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'staff', 'action'=> 'index', 'prefix' => 'admin'])?>"> <em class="fa fa-users"></em><span>Staff</span></a>
            </li>
			<!--<li class="sub-menu <?php  echo (($this->request->getParam('prefix')=='admin')&&($this->request->getParam('controller')=='Users')&&(($this->request->getParam('action')=='member')||($this->request->getParam('action')=='memberdetail')))? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member', 'prefix' => 'admin'])?>"> <em class="fa fa-users"></em><span>Members</span></a>
            </li>-->
			<li class="sub-menu <?php  echo ($this->request->getParam('controller')=='Stories')? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'stories', 'action'=> 'index', 'prefix' => 'admin'])?>"> <em class="fa fa-pencil-square"></em><span>Stories</span></a>
            </li>
			
			<li class="sub-menu <?php  echo ($this->request->getParam('controller')=='Transactions')? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'Transactions', 'action'=> 'index', 'prefix' => 'admin'])?>"> <em class="fa fa-dollar"></em><span>Transactions</span></a>
            </li>
			<li class="sub-menu <?php  echo ((($this->request->getParam('controller')=='EmailTemplates')&&(($this->request->getParam('action')=='index')||($this->request->getParam('action')=='edit'))) || ($this->request->getParam('controller')=='Galleries') || ($this->request->getParam('controller')=='LeadSources')|| (($this->request->getParam('controller')=='SmsTemplates')&&(($this->request->getParam('action')=='index')||($this->request->getParam('action')=='edit')))|| ($this->request->getParam('controller')=='Locations')|| ($this->request->getParam('controller')=='Links')||($this->request->getParam('controller')=='Vendors')|| ($this->request->getParam('controller')=='Hours')|| ($this->request->getParam('controller')=='FooterContact'))? 'active' : 'inactive' ?>">
              <a href="<?= $this->Url->build(['controller'=>'EmailTemplates', 'action'=> 'index','prefix'=>'admin'])?>"> <em class="fa fa-cogs"></em><span>Settings</span></a>
            </li>
			  <li class="sub-menu <?php  echo (($this->request->getParam('controller')=='EmailTemplates')&&(($this->request->getParam('action')=='massEmail')||($this->request->getParam('action')=='massEmailEdit')||($this->request->getParam('action')=='bulkMessage')))? 'active' : 'inactive' ?>">
				<a href="<?= $this->Url->build(['controller'=>'EmailTemplates', 'action'=> 'mass_email', 'prefix' => 'admin'])?>"> <em class="fa fa-envelope-o"></em><span>Mass Email</span></a>
			  </li>
			  <li class="sub-menu <?php  echo (($this->request->getParam('controller')=='SmsTemplates')&&(($this->request->getParam('action')=='massSms')))? 'active' : 'inactive' ?>">
				<a href="<?= $this->Url->build(['controller'=>'SmsTemplates', 'action'=> 'mass_sms', 'prefix' => 'admin'])?>"> <em class="fa fa-phone"></em><span>Mass SMS</span></a>
			  </li>
        <li class="sub-menu">
        <a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'member_view', 'prefix' => 'admin'])?>" target="_blank"> <em class="fa fa-eye"></em><span>Members View</span></a>
        </li>
			
				
            <!--<li class="sub-menu active">
              <a href="#"> <em class="fa fa-dashboard"></em><span>Dashboard</span></a>

            </li> 
            <li class="sub-menu ">
              <a href="#"> <em class="fa fa-map-marker"></em><span>Austin</span></a>
             
            </li> 
            <li class="sub-menu ">
              <a href="#"> <em class="fa fa-map-marker"></em><span>Denver</span></a>

            </li> 
            <li class="sub-menu ">
              <a href="#"> <em class="fa fa-map-marker"></em><span>Seattle</span></a>

            </li> 
            <li class="sub-menu">
              <a href="#">
             <em class="fa fa-users"></em><span>Users</span></a>
            </li> 
            <li class="sub-menu ">
              <a href="#"> <em class="fa fa-cogs"></em><span>Settings</span></a>

            </li> 
            <li class="sub-menu ">
              <a href="#"> <em class="fa fa-bar-chart"></em><span>Snapshot</span></a>

            </li> 
            <li class="sub-menu ">
              <a href="#">
             <em class="fa fa-circle-o"></em><span>Mass Emails</span></a>
            </li> 
            <li class="sub-menu">
              <a  href="#">
             <em class="fa fa-circle-o"></em><span>Mass Sms</span></a>
            </li> 
            <li class="sub-menu">
                 <a href="#"> 
                    <em class="fa fa-eye"></em><span>Members </span></a>
            </li>-->
               
            </ul>
            
        </nav>

