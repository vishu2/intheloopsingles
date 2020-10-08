<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards row-deck">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Locations</h4>
              <div class="card-options">
                  <a href="<?= $this->Url->build(['controller'=>'locations', 'action'=> 'add'])?>" class="btn btn-primary">Add</a>
              </div>
          </div>
          <div class="table-responsive">
              <table class="table card-table table-vcenter">
                  <thead>
                    <tr>
                      <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                  </thead>

                  <tbody>
                      
                      <?php foreach ($locations as $location): ?>
                        <tr>
                            <td class="text-muted"><?= $this->Number->format($location->id) ?></td>
                            <td  class="text-muted" ><?= h($location->name) ?></td>
                            <td  class="text-muted"><?= h($location->longitude) ?></td>
                            <td  class="text-muted"><?= h($location->latitude) ?></td>
                            <td  class="text-muted"><?= h($location->contact) ?></td>
                            <td  class="text-muted"><?= h($location->phone) ?></td>
                            <td  class="text-muted"><?= h($location->email) ?></td>
                            <td  class="text-muted"><?= h($location->created) ?></td>
                            <td  class="text-muted"><?= h($location->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?> |
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->name)]) ?>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
    </div>

    <?php echo $this->element('pagination'); ?>

  </div>
</div>
