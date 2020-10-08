<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationManager $locationManager
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location Manager'), ['action' => 'edit', $locationManager->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location Manager'), ['action' => 'delete', $locationManager->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationManager->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Location Managers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Manager'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locationManagers view large-9 medium-8 columns content">
    <h3><?= h($locationManager->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $locationManager->has('location') ? $this->Html->link($locationManager->location->name, ['controller' => 'Locations', 'action' => 'view', $locationManager->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($locationManager->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($locationManager->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($locationManager->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($locationManager->modified) ?></td>
        </tr>
    </table>
</div>
