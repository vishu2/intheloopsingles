<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Travels
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'travels', 'action'=> 'add'])?>">Add</a>
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
				<?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Travel name', 'value' => @$squery['name']]) ?>
			</div>
			<div class="form-group col-md-3 col-lg-2 mt-4"> 
			<a href="<?php echo $this->Url->build(['controller' => 'travels', 'action' => 'index'])?>" class="btn btn-primary ">Clear</a>
			<button type="submit" class="btn btn-primary " name='action'>Search</button>
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
							<?= $this->Paginator->sort('Travel Name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Depart Date') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Single') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Shared') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Registered') ?>
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
				   <?php $i=$this->Paginator->counter('{{start}}'); foreach ($travels as $travel): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= h($travel->travel_name) ?>
						</td>
						<td>
							<?= date('m/d/Y h:i A', strtotime($travel->depart_date)) ?>
						</td>
						<td>
							<?= $this->Number->currency((!empty($travel->cost_single) ? $travel->cost_single : 0), 'USD') ?>
						</td>
						<td>
							<?= $this->Number->currency((!empty($travel->cost_shared) ? $travel->cost_shared : 0), 'USD') ?>
						</td>
						<td><?= $travel->travel_registrations ? $this->Html->link($travel->travel_registrations[0]->total, ['controller' => 'Travels', 'action' => 'registered', $travel->id]) : '' ?></td>
						<td>
							<?= h($travel->created) ?>
						</td>
						<td class="text-muted">					  
							<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', $travel->id], ['escape' => false, 'title' => __('Edit')]) ?>						
							<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $travel->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $travel->id),'title' => __('Delete')]) ?>						 
						</td>
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>

