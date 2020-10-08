<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">      
			<h2 class="page-title">
				Locations
			</h2>
		</div>   
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
							<?= $this->Paginator->sort('location_name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('address') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('city') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('state_id') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('zip') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('phone') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('fax') ?>
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
					<?php $i=$this->Paginator->counter('{{start}}'); foreach ($locations as $location): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= h($location->location_name) ?>
						</td>
						<td>
							<?= h($location->address) ?>
						</td>
						<td>
							<?= h($location->city) ?>
						</td>
						<td>
							<?= $location->has('state') ? $this->Html->link($location->state->state_name, []) : '' ?>
						</td>
						<td>
							<?= h($location->zip) ?>
						</td>
						<td>
							<?= h($location->phone) ?>
						</td>
						<td>
							<?= h($location->fax) ?>
						</td>
						<td class="text-muted">
							<?= h($location->created) ?>
						</td>
						<td class="text-muted">						  
							<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($location->id)], ['escape' => false, 'title' => __('Edit')]) ?>												  
						</td>
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>

