<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Footer Contact Details
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
							<?= $this->Paginator->sort('Location') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Email') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Phone') ?>
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
				   <?php $i=$this->Paginator->counter('{{start}}'); foreach ($footerContact as $footerContact): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= h($footerContact->location) ?>
						</td>
						<td>
							<?= h($footerContact->phone) ?>
						</td>
						<td>
							<?= h($footerContact->email) ?>
						</td>
						<td class="text-muted">
							<?= h($footerContact->created) ?>
						</td>
						<td class="text-muted">					  
							<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($footerContact->id)], ['escape' => false, 'title' => __('Edit')]) ?>						
						</td>
					</tr>
				   <?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   <?php echo $this->element('pagination'); ?>
</div>