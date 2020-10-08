<script type="text/javascript">
	function setMembership() {
	var months = document.getElementById("no_of_months").value;
	var date = new Date();
	date.setMonth( date.getMonth() + parseInt(months) );
	document.getElementById("membership").valueAsDate = date;
	}
</script>
<script>
$(document).ready(function(){
    $("select").on("change",function() { 
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == 2){
               $(".monthly").show();
            } else{
                $(".monthly").hide();
            }
        });
    }).change();
});
</script>
<div class="page-header">
   <div class="row align-items-center">
      <div class="col-auto">
         <!-- Page pre-title -->
         <h2 class="page-title">
            Leads
         </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ml-auto d-print-none">
         <!--<span class="d-none d-sm-inline">
            <a href="#" class="btn btn-white">
              New view
            </a>
            </span>-->
         <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
         <!--<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?php $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">Add</a>-->
         <a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">
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
            </a>-->
      </div>
   </div>
</div>
<div class="collapse <?php echo (!empty($this->request->getQuery('action')) ? 'show' : '') ?>" data-actionCollapse='' id="collapseSearch">
   <div class="card card-body">
      <?php $squery = $this->request->getQueryParams(); ?>
      <?= $this->Form->Create(null, ['id' => 'userSearch', 'type' => 'get']) ?>
      <div class="row">
         <div class="form-group col-md-2">
            <label for="name">Name</label>
            <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Lead name', 'value' => @$squery['name']]) ?>
         </div>
         <div class="form-group col-md-2 mt-4"> 
            <a href="<?php echo $this->Url->build(['controller' => 'leads', 'action' => 'index'])?>" class="btn btn-primary ml-4 ">Clear</a>
            <button type="submit" class="btn btn-primary pull-right" name='action'>Search</button>
         </div>
      </div>
      <?= $this->Form->end(); ?>
   </div>
</div>
<div class="box">
   <div class="card">
      <div class="table-responsive">
         <table class="table table-vcenter card-table">
            <thead>
               <tr>
                  <th scope="col">Sr. Num</th>
                  <th scope="col">
                     <?= $this->Paginator->sort('lead_name') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('lead_email') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('lead_phone') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('lead_mobile') ?>
                  </th>
                  <!-- <th scope="col">
                     <?php //$this->Paginator->sort('converted') ?>
                  </th> -->
                  <th scope="col">
                     <?= $this->Paginator->sort('status') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('created', 'Last modified') ?>
                  </th>
                  <th scope="col" class="actions">
                     <?= __('Actions') ?>
                  </th>
               </tr>
            </thead>
            <tbody>
               <?php $i=$this->Paginator->counter('{{start}}'); foreach ($leads as $lead): ?>
               <tr data-id="<?= $lead->id; ?>">
                  <td>
                     <?= $i ?>
                  </td>
                  <td>
                     <?= $this->Html->link(h($lead->lead_name), ['controller' => 'appointments','action' => 'add', base64_encode($lead->id)]) ?>
                  </td>
                  <td>
                     <?= h($lead->lead_email) ?>
                  </td>
                  <td class="text-muted">
                     <?= h($lead->lead_phone) ?>
                  </td>
                  <td class="text-muted">
                     <?= h($lead->lead_mobile) ?>
                  </td>
                  <!-- <td class="text-muted">
                     <?php //h($lead->converted) ?>
                  </td> -->
					<td>
						<span class="badge bg-red-lt"><?= $lead->lead_status->status_name; ?></span>
					</td>
                  <td class="text-muted">
                     <?= $lead->modified ?>
                  </td>
                  <td class="text-muted">
                     <a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block convert-to-member" data-id = "<?= $lead->id;?>" data-name = "<?= $lead->lead_name;?>" data-mobile = "<?= $lead->lead_mobile;?>" data-email = "<?= $lead->lead_email;?>" >
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg> -->
                        Convert to Member
                     </a>
                     <?php //$this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', $lead->id], ['escape' => false, 'title' => __('Edit')]) ?>
                     <?php //$this->Form->postLink('<span class="fa fa-trash"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'delete', $lead->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $lead->lead_name), 'escape' => false, 'title' => __('Delete')]) ?>
                  </td>
               </tr>
               <?php $i++; endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <?php echo $this->element('pagination'); ?>
</div>
<!--Convert to member Modal start-->
<div class="modal modal-blur fade" id="convert-member-modal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Convert Lead</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"/>
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
               </svg>
            </button>
         </div>

         <?= $this->Form->Create(null, ['url' => ['controller' => 'users','action' => 'addMember'], 'id'=> 'convertLead', 'class'=>'convert-lead']) ?>

         <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <ul class="nav nav-tabs nav-fill" data-toggle="tabs">
                   <li class="nav-item">
                      <a href="#tab-lead-payment" class="nav-link active" data-toggle="tab">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                         Payment
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="#tab-lead-profile-info" class="nav-link" data-toggle="tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
                        Profile info
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="#tab-lead-notes" class="nav-link" data-toggle="tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="5" y="3" width="14" height="18" rx="2"></rect><line x1="9" y1="7" x2="15" y2="7"></line><line x1="9" y1="11" x2="15" y2="11"></line><line x1="9" y1="15" x2="13" y2="15"></line></svg>
                         Notes
                      </a>
                   </li>
                </ul>
                <div class="tab-content">
                  <?= $this->Form->Create(null, ['id'=> 'convertToMemberForm', 'class'=>'card']) ?>
                   <div class="tab-pane active show step1" id="tab-lead-payment">
                    <div class="row mt-4">
					<div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="mb-3">
                           <label class="form-label">No. of Months</label>
                           <input type="text" name="no_of_months" id="no_of_months"  onchange="setMembership();" class="form-control ignore" required>
                        </div>
                     </div>
					 <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="mb-3">
                           <label class="form-label">Pay in full</label>
                           <?= $this->Form->select('pay_in_full',[0=>'Select',1=>'Yes', 2=>'No'], ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Enter Name', 'required' => true]) ?>
                        </div>
                     </div>
					   <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="mb-3">
                           <label class="form-label">Total Cost:</label>
                           <?= $this->Form->control('total_cost', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Total Cost', 'required' => true]) ?>
                        </div>
                     </div>
					  <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="mb-3">
                           <label class="form-label">Membership:</label>
                           <input readonly type="date" class="form-control" id="membership" name="membership" placeholder="">
                        </div>
                     </div>
					 <div class="monthly col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                     <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="mb-3">
                           <label class="form-label">Down Payment</label>
                           <?= $this->Form->control('down_payment', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Down payment amount']) ?>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="mb-3">
                           <label class="form-label">Payment Date</label>
                           <?= $this->Form->control('payment_date', ['label' => false, 'class'=> 'form-control payment_date ignore']) ?>
                        </div>
                     </div> 
                   </div>
					</div>
                   </div>
                   <div class="row d-flex">
                       <div class="d-flex">
                         <button type="button" class="btn btn-primary next-step">Next</button>
                         <button type="button" class="btn btn-link prev-step">Previous</button>
                      </div>
                     </div>
                  </div>
                  <div class="tab-pane step2" id="tab-lead-profile-info">
                     <div class="row mt-4">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                           <div class="mb-3">
                              <label class="form-label">First Name</label>
                              <?= $this->Form->control('user_profile.first_name', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'First Name', 'required' => true]) ?>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                           <div class="mb-3">
                              <label class="form-label">Last Name</label>
                              <?= $this->Form->control('user_profile.last_name', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Last Name', 'required' => true]) ?>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                           <div class="mb-3">
                              <label class="form-label">Cell Phone</label>
                              <?= $this->Form->control('user_profile.mobile', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Enter Name', 'required' => true]) ?>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                           <div class="mb-3">
                              <label class="form-label">Email Address</label>
                              <?= $this->Form->control('users.email', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Enter Name', 'required' => true]) ?>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                           <div class="mb-3">
                              <label class="form-label">Date of Birth</label>
                              <div class="input-group date" id="birth">
                              <input class="form-control ignore"  name="user_profile[dob]" id="user-profile-dob" required="true"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
                            </div>
                             <!--  <?php //$this->Form->control('user_profile.dob', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Enter Age', 'required' => true]) ?> -->
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                           <div class="form-group mb-3">
                              <label class="form-label">Sex</label>
                              <label class="form-check form-check-inline">
                                 <input class="form-check-input" name="user_profile[sex]" value="1" type="radio" checked>
                                 <span class="form-check-label">Male</span>
                               </label>
                               <label class="form-check form-check-inline">
                                 <input class="form-check-input" name="user_profile[sex]" value="2" type="radio">
                                 <span class="form-check-label">Female</span>
                               </label>
                               
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                           <div class="mb-3">
                              <label class="form-label">Address</label>
                              <?= $this->Form->textarea('user_profile.address', ['label' => false, 'class'=> 'form-control ignore', 'placeholder' => 'Enter Address','rows' => '5', 'cols' => '5']) ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                       <div class="d-flex">
                         <button type="button" class="btn btn-primary next-step">Next</button>
                         <button type="button" class="btn btn-link prev-step">Previous</button>
                      </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-lead-notes">
                     <div class="row mt-4">
                        <div class="col-md-8 col-lg-8 col-xl-6">
                           <div class="mb-3">
                              <label class="form-label">Notes</label>
                              <?= $this->Form->textarea('notes', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Notes', 'rows' => '5', 'cols' => '5']) ?>
                           </div>
                        </div>
                     </div>
                     <div class="row d-flex">
                       <div class="d-flex">
                         <button type="submit" name="lead_id"  class="btn btn-primary lead-convert">Save</button>
                         <button type="button" class="btn btn-link prev-step">Previous</button>
                      </div>
                     </div>
                  </div>
                  <?= $this->Form->end(); ?>
                </div>
              </div>
            </div>
         </div>

         <!-- <div class="modal-footer">
            <div class="d-flex">
               <button type="submit" class="btn btn-primary ">Save</button>
               <button type="button" class="btn btn-link addLocation-modal-close" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
         </div> -->

         <?= $this->Form->end(); ?>
      </div>
   </div>
</div>
<!--Convert to member Modal start-->

<script>
    $(function() {

    $(document).on('click', '.convert-to-member', function(){
      var $this = $(this);
      $("#user-profile-first-name").val($this.attr('data-name').split(' ')[0]);
      $("#user-profile-last-name").val($this.attr('data-name').split(' ')[1]);
      $("#user-profile-mobile").val($this.attr('data-mobile'));
      $("#users-email").val($this.attr('data-email'));
      $(".lead-convert").val($this.attr('data-id'));
      $("#convert-member-modal").modal('show');
    });
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    var $form = $("#convertLead");
    var $validForm = $form.validate({
        ignore: ".ignore"
    });
    
    $(".next-step").click(function (e) {
        var $active = $('.nav-tabs li>a.active');
        $(document).find($($active).attr('href')).find('.ignore').each(function(){
          $(this).removeClass('ignore');
        });
        console.log($validForm);

        if(!$form.valid()){
          return false;
        }else{
          nextTab($active);
        }
        //$active.removeClass('active');
    });
    
    $(".prev-step").click(function (e) {
        var $active = $('.nav-tabs li>a.active');
        prevTab($active);
    });

    $('.payment_date').datepicker();

    $('#birth').datetimepicker({
        useCurrent: true,
        format: "L",
        //defaultDate: "moment",
        showTodayButton: true,
        //minDate: "moment",
        toolbarPlacement: "bottom",
        icons: {
          next: "fa fa-chevron-right",
          previous: "fa fa-chevron-left",
          today: 'texttoday',
        }
    });
});

function nextTab(elem) {
  console.log('next tab');
    $(elem).removeClass('active');
    $(document).find($(elem).attr('href')).removeClass('active show');
    $(elem).parent().next().find('a[data-toggle="tab"]').addClass('active');
    $(document).find($(elem).parent().next().find('a[data-toggle="tab"]').attr('href')).addClass('active show');
  
   
}
function prevTab(elem) {
  $(elem).removeClass('active');
  $(document).find($(elem).attr('href')).removeClass('active show');
  $(elem).parent().prev().find('a[data-toggle="tab"]').addClass('active');
  $(document).find($(elem).parent().prev().find('a[data-toggle="tab"]').attr('href')).addClass('active show');
    //$(elem).parent().prev().find('a[data-toggle="tab"]').click();
}


</script>
