<div class="row">
   <div class="col-12">
      <?= $this->Form->Create($leadSource, ['id'=> 'addleadsource', 'class'=>'card']) ?>
      <div class="card-header">
         <h4 class="card-title"><?= __('Add Lead Source') ?></h4>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Source Name</label>
                  <?= $this->Form->control('source_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Source name']) ?>
               </div>
            </div>          
            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Location</label>
                  <?= $this->Form->select('location_id', $locations, ['label' => false, 'class'=> 'form-control']) ?>
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
<script type="text/javascript">
    $(function () {
        $("#addleadsource").validate( {
		rules: {					
			source_name: {
				required:true
			}
		},
		messages:{		
			source_name: {
				required:"Please Enter Source Name"
			}
		}	
		});
    });
</script>