<div class="row">
    <div class="col-12">
		<?= $this->Form->Create($hour, [ 'class'=>'card','id'=>'edithours']) ?>
        <div class="card-header">
			<h4 class="card-title">Edit Business Hours</h4> 
		</div>
        <div class="card-body">
			<div class="row">           
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Location</label>
					<?= $this->Form->control('location_id', ['options' => $locations, 'label' => false, 'class'=> 'form-control','disabled'=>'true']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Days</label>
					<?= $this->Form->control('day', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Days']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Timings</label>
					<?= $this->Form->control('timing', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Timings']) ?>
				  </div>
				</div>
			</div>
        </div>
        <div class="card-footer text-right">
			<div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
				<button type="submit" class="btn btn-primary ml-auto">Update</button>
			</div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
	<script>
		$(document).ready(function() {
		$("#edithours").validate( {
		rules: {					
			day: {
				required:true
			},
			timing: {
				required:true
			}
		},
		messages:{		
			day: {
				required: "Please Enter Days"
			},
			timing: {
				required:"Please Enter Timings"
			}
		}		
		});
		});
	</script>