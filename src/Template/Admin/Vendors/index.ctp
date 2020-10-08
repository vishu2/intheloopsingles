<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Vendors
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'vendors', 'action'=> 'add'])?>">Add</a>
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
				<?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Vendor name', 'value' => @$squery['name']]) ?>
			</div>
			<div class="form-group col-md-2 mt-4"> 
			<a href="<?php echo $this->Url->build(['controller' => 'vendors', 'action' => 'index'])?>" class="btn btn-primary ml-4 ">Clear</a>
			<button type="submit" class="btn btn-primary pull-right" name='action'>Search</button>
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
							<?= $this->Paginator->sort('vendor_name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('phone') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('address') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('city') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('state') ?>
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
				   <?php $i=$this->Paginator->counter('{{start}}'); foreach ($vendors as $vendor): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= h($vendor->vendor_name) ?>
						</td>
						<td>
							<?= h($vendor->phone) ?>
						</td>
						<td>
							<?= h($vendor->address) ?>
						</td>
						<td>
							<?= h($vendor->city) ?>
						</td>
						<td>
							<?= $vendor->has('state') ? $this->Html->link($vendor->state->state_name, []) : '' ?>
						</td>
						<td class="text-muted">
							<?= h($vendor->created) ?>
						</td>
						<td class="text-muted">					  
							<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($vendor->id)], ['escape' => false, 'title' => __('Edit')]) ?>						
							<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $vendor->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $vendor->id),'title' => __('Delete')]) ?>						 
						</td>
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>