<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Gallery $gallery
  */
?>

<div class="galleries view large-9 medium-8 columns content">
    <h3><?= h($gallery->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($gallery->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gallery->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gallery->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($gallery->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Gallery Id') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gallery->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->name) ?></td>
                <td><?= h($images->path) ?></td>
                <td><?= h($images->user_id) ?></td>
                <td><?= h($images->gallery_id) ?></td>
                <td><?= h($images->is_deleted) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tours') ?></h4>
        <?php if (!empty($gallery->tours)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col"><?= __('Price From') ?></th>
                <th scope="col"><?= __('Price To') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('No Of Adults') ?></th>
                <th scope="col"><?= __('No Of Children') ?></th>
                <th scope="col"><?= __('Facilities') ?></th>
                <th scope="col"><?= __('Recommendations') ?></th>
                <th scope="col"><?= __('Not Included') ?></th>
                <th scope="col"><?= __('Gallery Id') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gallery->tours as $tours): ?>
            <tr>
                <td><?= h($tours->id) ?></td>
                <td><?= h($tours->name) ?></td>
                <td><?= h($tours->slug) ?></td>
                <td><?= h($tours->rating) ?></td>
                <td><?= h($tours->price_from) ?></td>
                <td><?= h($tours->price_to) ?></td>
                <td><?= h($tours->description) ?></td>
                <td><?= h($tours->no_of_adults) ?></td>
                <td><?= h($tours->no_of_children) ?></td>
                <td><?= h($tours->facilities) ?></td>
                <td><?= h($tours->recommendations) ?></td>
                <td><?= h($tours->not_included) ?></td>
                <td><?= h($tours->gallery_id) ?></td>
                <td><?= h($tours->is_deleted) ?></td>
                <td><?= h($tours->created) ?></td>
                <td><?= h($tours->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tours', 'action' => 'view', $tours->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tours', 'action' => 'edit', $tours->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tours', 'action' => 'delete', $tours->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tours->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
