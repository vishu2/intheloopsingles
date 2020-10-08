<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberNote[]|\Cake\Collection\CollectionInterface $memberNotes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Member Note'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberNotes index large-9 medium-8 columns content">
    <h3><?= __('Member Notes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberNotes as $memberNote): ?>
            <tr>
                <td><?= $this->Number->format($memberNote->id) ?></td>
                <td><?= $memberNote->has('user') ? $this->Html->link($memberNote->user->id, ['controller' => 'Users', 'action' => 'view', $memberNote->user->id]) : '' ?></td>
                <td><?= h($memberNote->created) ?></td>
                <td><?= h($memberNote->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $memberNote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $memberNote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $memberNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberNote->id)]) ?>
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
