<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Events
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'events', 'action'=> 'add'])?>">Add</a>
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
				<?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Event name', 'value' => @$squery['name']]) ?>
			</div>
			<div class="form-group col-md-3 col-lg-2 mt-4"> 
			<a href="<?php echo $this->Url->build(['controller' => 'events', 'action' => 'index'])?>" class="btn btn-primary  ">Clear</a>
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
							<?= $this->Paginator->sort('Event Name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Venue Name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Event Datetime') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Fee') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Published') ?>
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
				   <?php $i=$this->Paginator->counter('{{start}}'); foreach ($events as $event): ?>
					<tr>
						<td>
							<?= $i; ?>
						</td>
						<td>
							<?= h($event->event_name) ?>
						</td>
						<td>
							<?= h($event->venue_name) ?>
						</td>
						<td>
							<?= date('m/d/Y', strtotime($event->start_date)) ?>
						</td>
						<td>
							<?= $this->Number->currency((!empty($event->event_fee) ? $event->event_fee : 0), 'USD') ?>
						</td>
						<td>
							<?php if(($event->published)==1) { echo "Yes"; } else { echo "No";}?>
						</td>
						<td><?= $event->event_registrations ? $this->Html->link($event->event_registrations[0]->total, ['controller' => 'Events', 'action' => 'registered', base64_encode($event->id)]) : $this->Html->link('0', ['controller' => 'Events', 'action' => 'registered', base64_encode($event->id)]) ?></td>
						
						<td>
							<?= h($event->created) ?>
						</td>
						<td class="text-muted">	
							<?= $this->Html->link('<span class="fa fa-eye edit_btn"></span><span class="sr-only">' . __('Event details') . '</span>', ['controller'=>'events', 'action'=> 'eventdetails', base64_encode($event->id)], ['escape' => false, 'title' => __('Event details'), 'target'=>'_blank']) ?>
							<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($event->id)], ['escape' => false, 'title' => __('Edit')]) ?>						
							<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $event->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $event->id),'title' => __('Delete')]) ?>						 
						</td>
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>

