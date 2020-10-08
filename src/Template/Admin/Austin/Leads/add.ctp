<div class="row">
   <div class="col-12">
      <?= $this->Form->Create($lead, ['id'=> 'addLeadForm', 'class'=>'card']) ?>
      <div class="card-header">
         <h4 class="card-title"><?= __('Add Lead') ?></h4>
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
                  <label class="form-label">Lead Source</label>
                  <?= $this->Form->select('lead_source_id', $leadsource, ['label' => false, 'class'=> 'form-control']) ?>
               </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Lead Status</label>
                  <?= $this->Form->select('lead_status_id', $leadstatus, ['label' => false, 'class'=> 'form-control']) ?>
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
		$("#addLeadForm").validate( {
		rules: {					
			lead_name: {
				required:true
			},
			lead_mobile: {
				required:true,
				number: true
			},
			lead_email: {
				required:true,
				email:true
			}
		},
		messages:{		
			lead_name: {
				required:"Please Enter Lead Name"
			},
			lead_mobile: {
				required:"Please Enter Lead Contact no.",
				number: "Please Enter Valid Contact no."
			},
			lead_email: {
				required:"Please Enter Lead Email",
				email:"Please Enter valid Email Address"
			}
		}		
		});
		});
</script>