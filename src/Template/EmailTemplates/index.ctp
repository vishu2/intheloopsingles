
<!-- Page title -->

<div class="row">
  <div class="col-md-12">
    
   <div class="card">
      <div class="card-header">
        <h4 class="card-title">Email Templates</h4>
      </div>
      <div class="table-responsive">
        <table class="table card-table table-vcenter">
          <thead>
            <tr>
              <th scope="col">Sr. Num</th>
             
              <th scope="col"><?= $this->Paginator->sort('Subject') ?></th>
              <th scope="col"><?= $this->Paginator->sort('template_for') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
          </thead>
          <tbody>
  <?php $i=1; foreach ($emailTemplates as $emailTemplate): ?>
            <tr>
              <td><?= $i ?></td>
              <td class="text-muted"><?= h($emailTemplate->subject) ?></td>
              <td class="text-muted"><?= h($emailTemplate->template_for) ?></td>
              <td class="text-muted"><?= $emailTemplate->modified ?></td>
              <td class="text-muted">
                <span class="badge bg-gray-lt">
                <?= $this->Html->link('Edit', ['action' => 'edit', $emailTemplate->id]) ?>
                </span>

            </td>

            </tr>

           <?php $i++; endforeach; ?>
        </tbody></table>
      </div>

      
    </div>
  </div>
</div>

<div class="d-flex">
  <ul class="pagination ml-auto">
      <?php
          $this->Paginator->setTemplates([
              'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          $this->Paginator->setTemplates([
              'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          ?>
          <?= $this->Paginator->prev('<< Previous') ?>
          <?php
          $this->Paginator->setTemplates([
              'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
              'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          ?>
          <?= $this->Paginator->numbers() ?>

          <?php
          $this->Paginator->setTemplates([
              'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          $this->Paginator->setTemplates([
              'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          ?>
          <?= $this->Paginator->next('Next >>') ?>
  </ul>
</div>
