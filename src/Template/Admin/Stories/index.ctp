<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Story
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'stories', 'action'=> 'add'])?>">Add</a>
			<!--<a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'stories', 'action'=> 'add'])?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z"></path>
               <line x1="12" y1="5" x2="12" y2="19"></line>
               <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
			</a>-->      
		</div>
	</div>
</div>
<div class="collapse <?php echo (!empty($this->request->getQuery('action')) ? 'show' : '') ?>" data-actionCollapse='' id="collapseSearch">
	<div class="card card-body">
		<?php $squery = $this->request->getQueryParams(); ?>
		<?= $this->Form->Create(null, ['type' => 'get']) ?>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="name">Name</label>
				<?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Member name', 'value' => @$squery['name']]) ?>
			</div>
			<div class="form-group col-md-2 mt-4"> 
			<a href="<?php echo $this->Url->build(['controller' => 'stories', 'action' => 'index'])?>" class="btn btn-primary ml-4 ">Clear</a>
			<button type="submit" class="btn btn-primary pull-right" name='action'>Search</button>
			</div>
		</div>
		<?= $this->Form->end(); ?>
	</div>
</div>
<div class="box">
	<div class="card">
		<div class="table-responsive">
			<table class="table table-vcenter card-table table-striped">
				<thead>
					<tr>
						<th scope="col">Sr. Num</th>
						<th scope="col">
							<?= $this->Paginator->sort('member_name') ?>
						</th>
						<th scope="col">
						Featured Image
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('story_content') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('created') ?>
						</th>
						<th scope="col" class="actions">
							<?= __('Actions') ?>
						</th>
					</tr>
				</thead>
				<tbody>
				   <?php $i=$this->Paginator->counter('{{start}}'); foreach ($stories as $story): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= h($story->member_name) ?>
						</td>
						<td class="text-muted">
							<?= $this->Html->image('/files/member-story-image/'.$story->story_image, ['alt' => 'Picture', 'height'=>'70px',  'width'=>'70px','class'=>'rounded-circle']); ?>
						</td>
						<td class="text-muted">
							<?= substr($story->story_content, 0, 150) ?>...
						</td>
						<td class="text-muted">
							<?= h($story->created) ?>
						</td>
						<td class="text-muted">					  
							<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($story->id)], ['escape' => false, 'title' => __('Edit')]) ?>						
							<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $story->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $story->id),'title' => __('Delete')]) ?>						 
						</td>
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>
