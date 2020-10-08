<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FooterContact $footerContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Footer Contact'), ['action' => 'edit', $footerContact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Footer Contact'), ['action' => 'delete', $footerContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footerContact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Footer Contact'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Footer Contact'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="footerContact view large-9 medium-8 columns content">
    <h3><?= h($footerContact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($footerContact->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($footerContact->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($footerContact->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($footerContact->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($footerContact->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($footerContact->modified) ?></td>
        </tr>
    </table>
</div>
