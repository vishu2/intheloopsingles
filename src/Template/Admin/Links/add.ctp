 <div class="row">
    <div class="col-12">
      <?= $this->Form->Create($link, ['id'=> 'addlink', 'class'=>'card']) ?>
        <div class="card-header">
          <h4 class="card-title">Add Social Links</h4> </div>
        <div class="card-body">
          <div class="row">
            
            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Facebook Link</label>
                <?= $this->Form->control('facebook', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Facebook Link']) ?>
              </div>
            </div>
			
			<div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Google+</label>
                <?= $this->Form->control('google', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Google+']) ?>
              </div>
            </div>
			
			<div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Instagram</label>
                <?= $this->Form->control('instagram', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Instagram']) ?>
              </div>
            </div>

          </div>
        </div>
        <div class="card-footer text-right">
          <div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Send data</button>
          </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
  </div>
	<script>
		$(document).ready(function() {
		$("#addlink").validate( {
		rules: {					
			facebook: {
				required:true
			},
			google: {
				required:true
			},	
			instagram: {
				required:true
			}
		},
		messages:{		
			facebook: {
				required: "Please Enter Facebook Link"
			},
			google: {
				required: "Please Enter Link"
			},	
			instagram: {
				required: "Please Enter Link"
			}
		}		
		});
		});
	</script>