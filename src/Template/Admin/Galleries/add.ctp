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
      <?= $this->Form->Create($gallery, ['id'=> 'addgallery', 'class'=>'card']) ?>
      <div class="card-header">
         <h4 class="card-title"><?= __('Add Gallery') ?></h4>
      </div>
      <div class="card-body">
         <div class="row">

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <?= $this->Form->control('name', ['label' => false, 'class'=> 'form-control NoWhiteSpaceAtBeginn', 'placeholder' => 'Enter name' ,'id' => 'name']) ?>
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

<script>
$(document).ready(function() {
     $.validator.addMethod("spaceSpecialCharAllowed", function(value, element) {
        return this.optional(element) || /^[^-\s][a-zA-Z0-9&-\s-]+[\S]$/gm.test(value);
    }, "Space at beginning/end and special characters are not allowed.");

    $('#addgallery').validate({
        rules:{
            name:{
                required: true,
                minlength: 3,
                maxlength: 70,
                spaceSpecialCharAllowed: true,
            }
        },
        messages:{
            name:{
                required:"Please enter name",
                maxlength:"Maximum 70 characters are allowed"
            } 
        }
    });
});
</script>