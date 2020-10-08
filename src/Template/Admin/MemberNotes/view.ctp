<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberNote $memberNote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Member Note'), ['action' => 'edit', $memberNote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Member Note'), ['action' => 'delete', $memberNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberNote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Member Notes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member Note'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="memberNotes view large-9 medium-8 columns content">
    <h3><?= h($memberNote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $memberNote->has('user') ? $this->Html->link($memberNote->user->id, ['controller' => 'Users', 'action' => 'view', $memberNote->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($memberNote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($memberNote->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($memberNote->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($memberNote->notes)); ?>
    </div>
</div>
