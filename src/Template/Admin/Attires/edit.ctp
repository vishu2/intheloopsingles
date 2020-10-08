<div class="row">
   <div class="col-12">
      <?= $this->Form->Create($attire, ['id'=> 'editattire', 'class'=>'card']) ?>
      <div class="card-header">
         <h4 class="card-title"><?= __('Edit Attire') ?></h4>
      </div>
      <div class="card-body">
         <div class="row">

            <div class="col-md-4 col-lg-4 col-xl-4">
               <div class="mb-3">
                  <label class="form-label">Attire Name</label>
                  <?= $this->Form->control('attire_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Attire name']) ?>
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
        $("#editattire").validate( {
		rules: {					
			attire_name: {
				required:true
			}
		},
		messages:{		
			attire_name: {
				required:"Please Enter Attire Name"
			}
		}	
		});
    });
</script>