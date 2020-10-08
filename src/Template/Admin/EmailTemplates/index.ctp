<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">
        Email Templates
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
                <?= $this->Paginator->sort('subject') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('template_for') ?>
            </th>
            <th scope="col" class="actions">
                <?= __('Actions') ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $i=$this->Paginator->counter('{{start}}'); foreach ($emailTemplates as $emailTemplate): ?>
              <tr>
                  <td>
                      <?= $i ?>
                  </td>
                  <td>
                      <?= h($emailTemplate->subject) ?>
                  </td>
                  <td>
                      <?= h($emailTemplate->template_for) ?>
                  </td>
                 
                  <td class="text-muted">
                      
                        <?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($emailTemplate->id)], ['escape' => false, 'title' => __('Edit')]) ?>
                     
                  </td>
              </tr>
              <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
    <?php //echo $this->element('pagination'); ?>
</div>
