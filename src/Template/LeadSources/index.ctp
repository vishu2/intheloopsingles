<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeadSource[]|\Cake\Collection\CollectionInterface $leadSources
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lead Source'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leads'), ['controller' => 'Leads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['controller' => 'Leads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leadSources index large-9 medium-8 columns content">
    <h3><?= __('Lead Sources') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leadSources as $leadSource): ?>
            <tr>
                <td><?= $this->Number->format($leadSource->id) ?></td>
                <td><?= h($leadSource->source_name) ?></td>
                <td><?= $leadSource->has('location') ? $this->Html->link($leadSource->location->name, ['controller' => 'Locations', 'action' => 'view', $leadSource->location->id]) : '' ?></td>
                <td><?= $this->Number->format($leadSource->source_status) ?></td>
                <td><?= h($leadSource->created) ?></td>
                <td><?= h($leadSource->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $leadSource->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leadSource->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leadSource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leadSource->id)]) ?>
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
