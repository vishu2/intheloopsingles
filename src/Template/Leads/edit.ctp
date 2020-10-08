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
      <?= $this->Form->Create($lead, ['id'=> 'editLeadForm', 'class'=>'card']) ?>
      <div class="card-header">
         <h4 class="card-title"><?= __('Edit Lead') ?></h4>
      </div>
      <div class="card-body">
         <div class="row">

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <?= $this->Form->control('lead_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter name']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Mobile</label>
                  <?= $this->Form->control('lead_mobile', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter mobile']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Email</label>
                  <?= $this->Form->control('lead_email', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'you@comany.com']) ?>
               </div>
            </div>
            
            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Client</label>
                  <?= $this->Form->select('client_id', $clients, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Type</label>
                  <?= $this->Form->select('lead_type_id', $leadTypes, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Source</label>
                  <?= $this->Form->select('lead_source_id', $leadSources, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

            
            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Contact name</label>
                  <?= $this->Form->control('lead_contact_name', ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Address</label>
                  <?= $this->Form->control('address', ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">City</label>
                  <?= $this->Form->control('city', ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">State</label>
                  <?= $this->Form->select('state_id', $states, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Country</label>
                  <?= $this->Form->select('country_id', $countries, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>
            
            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Converted</label>
                  <?= $this->Form->control('converted', ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Location</label>
                  <?= $this->Form->select('location_id', $locations, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Notes</label>
                  <?= $this->Form->control('notes', ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Status</label>
                  <?= $this->Form->select('lead_status_id', $clients, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

         </div>
      </div>
      <div class="card-footer text-right">
         <div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Save</button>
         </div>
      </div>
      <?= $this->Form->end(); ?>
   </div>
</div>
