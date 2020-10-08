<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards row-deck">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?= __('Types') ?></h4>
          <div class="card-options">
            <a href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>" class="btn btn-primary">Add</a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter">
            <thead>
              <tr>
                <th scope="col">Sr. Num</th>
                  <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($types as $type): ?>
              <tr>
                <td><?= $i ?></td>
                <td class="text-muted"><?= h($type->type) ?></td>
                <td class="text-muted"><?php
                  if($type->status == 1) {
                    ?>
                      <span class="badge bg-green-lt">Active</span>
                    <?php
                  }else{
                    ?>
                      <span class="badge bg-red-lt">Inactive</span>

                  <?php } ?>
                </td>
                <td class="text-muted"><?= $type->modified ?></td>
                <td class="text-muted">
                  <span class="badge bg-gray-lt">
                  <?= $this->Html->link('Edit', ['action' => 'edit', $type->id]) ?>
                  </span>

                  <span class="badge bg-gray-lt">
                    <?= $this->Form->postLink(__('Delete'),['action' => 'delete', $type->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $type->type)]) ?>
                  </span>
                </td>

              </tr>

             <?php $i++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    

    <?php echo $this->element('pagination'); ?>

  </div>
</div>
