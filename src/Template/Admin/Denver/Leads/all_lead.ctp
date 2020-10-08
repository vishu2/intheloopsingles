
<div class="page-header">
   <div class="row align-items-center">
      <div class="col-auto">
        
         <h2 class="page-title">
            Leads
         </h2>
      </div>
      
      <div class="col-auto ml-auto d-print-none">
         
         <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
         <a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'leads', 'action'=> 'add'])?>">Add</a>
         
      </div>
   </div>
</div>
<div class="collapse <?php echo (!empty($this->request->getQuery('action')) ? 'show' : '') ?>" data-actionCollapse='' id="collapseSearch">
   <div class="card card-body">
      <?php $squery = $this->request->getQueryParams(); ?>
      <?= $this->Form->Create(null, ['id' => 'userSearch', 'type' => 'get']) ?>
      <div class="row">
         <div class="form-group col-md-2">
            <label for="name">Name</label>
            <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Lead name', 'value' => @$squery['name']]) ?>
         </div>
         <div class="form-group col-md-2 mt-4"> 
            <a href="<?php echo $this->Url->build(['controller' => 'leads', 'action' => 'allLead'])?>" class="btn btn-primary ml-4 ">Clear</a>
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
						<?= $this->Paginator->sort('lead_name') ?>
					</th>
					<th scope="col">
						<?= $this->Paginator->sort('lead_email') ?>
					</th>
					<th scope="col">
						<?= $this->Paginator->sort('lead_mobile') ?>
					</th> 				
					<th scope="col">
						<?= $this->Paginator->sort('lead_status') ?>
					</th>  
					<th scope="col">
						<?= $this->Paginator->sort('created', 'Last modified') ?>
					</th>
					<th scope="col" class="actions">
						<?= __('Actions') ?>
					</th>
               </tr>
            </thead>
            <tbody>
               <?php $i=$this->Paginator->counter('{{start}}'); foreach ($leads as $lead): ?>
               <tr data-id="<?= $lead->id; ?>">
                  <td>
                     <?= $i ?>
                  </td>
                  <td >
                      <?= $this->Html->link(h($lead->lead_name), ['controller' => 'appointments','action' => 'add', base64_encode($lead->id)]) ?>
                  </td>
                  <td>
                     <?= h($lead->lead_email) ?>
                  </td>                 
                  <td class="text-muted">
                     <?= h($lead->lead_mobile) ?>
                  </td>				
                 <td class="text-muted">
                     <?= h($lead->lead_status->status_name) ?>
                  </td>
                  <td class="text-muted">
                     <?= $lead->modified ?>
                  </td>
                  <td class="text-muted">
                    <?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($lead->id)], ['escape' => false, 'title' => __('Edit')]) ?>					
					<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $lead->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $lead->id),'title' => __('Delete')]) ?>		
                  </td>
               </tr>
               <?php $i++; endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <?php echo $this->element('pagination'); ?>
</div>