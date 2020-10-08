<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationManager[]|\Cake\Collection\CollectionInterface $locationManagers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Location Manager'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locationManagers index large-9 medium-8 columns content">
    <h3><?= __('Location Managers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locationManagers as $locationManager): ?>
            <tr>
                <td><?= $this->Number->format($locationManager->id) ?></td>
                <td><?= $locationManager->has('location') ? $this->Html->link($locationManager->location->name, ['controller' => 'Locations', 'action' => 'view', $locationManager->location->id]) : '' ?></td>
                <td><?= h($locationManager->name) ?></td>
                <td><?= h($locationManager->created) ?></td>
                <td><?= h($locationManager->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $locationManager->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locationManager->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locationManager->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationManager->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
