<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">
        Employees
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ml-auto d-print-none">
      
      <a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'employees', 'action'=> 'add'])?>">Add</a>

      <a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'employees', 'action'=> 'add'])?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>
    
      <!--<a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block" data-toggle="modal" data-target="#modal-report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Create new report
      </a>
      <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>-->

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
              <th scope="col"><?= $this->Paginator->sort('name') ?></th>
              <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
              <th scope="col"><?= $this->Paginator->sort('award_id') ?></th>
              <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
              <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
              <th scope="col"><?= $this->Paginator->sort('rate_id') ?></th>
              <th scope="col"><?= $this->Paginator->sort('created') ?></th>
              <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
      
          <tbody>
              <?php $i = 1; foreach ($employees as $employee): ?>
              <tr>
                  <td class="text-muted"><?= $i ?></td>
                  <td class="text-muted"><?= h($employee->name) ?></td>
                  <td class="text-muted"><?= $this->Number->format($employee->rating) ?></td>
                  <td class="text-muted"><?= $employee->award->title ?></td>
                  <td class="text-muted"><?= h($employee->start_date) ?></td>
                  <td class="text-muted"><?= $employee->state->name ?></td>
                  <td class="text-muted"><?= $employee->rate->name ?></td>
                  <td class="text-muted"><?= h($employee->created) ?></td>
                  <td class="text-muted"><?= h($employee->modified) ?></td>
                  <td class="actions">
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?> | 
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->name)]) ?>
                  </td>
              </tr>
              <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
  </div>
  <?php echo $this->element('pagination'); ?>
</div>