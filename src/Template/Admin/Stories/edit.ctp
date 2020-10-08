<div class="row">
    <div class="col-12">
		<?= $this->Form->Create($story, [ 'class'=>'card','id'=>'addstory','type'=>'file']) ?>
        <div class="card-header">
			<h4 class="card-title">Edit Story</h4> 
		</div>
        <div class="card-body">
			<div class="row">           
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label"> Name</label>
					<?= $this->Form->control('member_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Member name']) ?>
				  </div>
				</div>
				<div class="col-md-8 col-lg-8 col-xl-8">
				  <div class="mb-3">
					<label class="form-label">Content</label>
					<?= $this->Form->control('story_content', ['label' => false, 'class'=> 'form-control', 'type' => 'textarea']) ?>
				  </div>
				</div>
				<div class="col-md-4 col-lg-4 col-xl-4">
				  <div class="mb-3">
					<label class="form-label">Image</label>
					<?= $this->Form->control('story_image', array('label' => false,'type' => 'file', 'id'=>'img', 'class'=>'form-control'));?>
					<?= $this->Html->image('/files/member-story-image/'.$story->story_image, ['alt' => 'Picture','height'=>'80px']); ?>
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
		$("#addstory").validate( {
		rules: {					
			member_name: {
				required:true
			},
			story_content: {
				required:true
			},
			story_image: {
				required:false
			}
		},
		messages:{		
			member_name: {
				required: "Please Enter Member Name"
			},
			story_content: {
				required: "Please Enter Story Content"
			}
		}		
		});
		});
	</script>