<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeadStatus[]|\Cake\Collection\CollectionInterface $leadStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lead Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leads'), ['controller' => 'Leads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['controller' => 'Leads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leadStatus index large-9 medium-8 columns content">
    <h3><?= __('Lead Status') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leadStatus as $leadStatus): ?>
            <tr>
                <td><?= $this->Number->format($leadStatus->id) ?></td>
                <td><?= h($leadStatus->status_name) ?></td>
                <td><?= $this->Number->format($leadStatus->status) ?></td>
                <td><?= h($leadStatus->created) ?></td>
                <td><?= h($leadStatus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $leadStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leadStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leadStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leadStatus->id)]) ?>
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
