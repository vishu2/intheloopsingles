<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hour'), ['action' => 'edit', $hour->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hour'), ['action' => 'delete', $hour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hour->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hours'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hour'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hours view large-9 medium-8 columns content">
    <h3><?= h($hour->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $hour->has('location') ? $this->Html->link($hour->location->id, ['controller' => 'Locations', 'action' => 'view', $hour->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= h($hour->day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timing') ?></th>
            <td><?= h($hour->timing) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($hour->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($hour->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($hour->modified) ?></td>
        </tr>
    </table>
</div>
