<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Transaction Details
			</h2>
		</div>   
		<!--<div class="col-auto ml-auto d-print-none">        
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'transaction', 'action'=> 'add'])?>">Add</a>
		</div>-->
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
							<?= $this->Paginator->sort('user_id') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Transaction Id') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('amount_paid') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('payment_status') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('transaction_date') ?>
						</th>
						<!--<th scope="col" class="actions">
							<?= __('Actions') ?>
						</th>-->
					</tr>
				</thead>
				<tbody>
				   <?php $i=$this->Paginator->counter('{{start}}'); foreach ($transactions as $transaction): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= $transaction->has('user') ? $transaction->user->email : '' ?>
						</td>
						<td>
							<?= h($transaction->stripe_charge_id) ?>
						</td>
						<td>
							<?= $this->Number->currency($transaction->amount_paid/100, 'USD') ?>
						</td>
						<td>
							<?= h($transaction->payment_status) ?>
						</td>
						<td>
							<?= date('m/d/Y', strtotime($transaction->transaction_date)); ?>
						</td>
						<!--<td class="text-muted">					  
							<?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', $transaction->id], ['escape' => false, 'title' => __('Edit')]) ?>						
							<?= $this->Form->postLink('<span class="fa fa-trash"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $transaction->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $transaction->id),'title' => __('Delete')]) ?>						 
						</td>-->
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>