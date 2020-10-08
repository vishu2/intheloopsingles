<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Location Managers'), ['controller' => 'LocationManagers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location Manager'), ['controller' => 'LocationManagers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($location->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= h($location->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($location->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($location->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($location->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($location->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($location->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($location->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Legal Name') ?></th>
                <th scope="col"><?= __('Abn') ?></th>
                <th scope="col"><?= __('Contact Person') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Invoicing Name') ?></th>
                <th scope="col"><?= __('Invoicing Email') ?></th>
                <th scope="col"><?= __('Invoicing Phone') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->clients as $clients): ?>
            <tr>
                <td><?= h($clients->id) ?></td>
                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->legal_name) ?></td>
                <td><?= h($clients->abn) ?></td>
                <td><?= h($clients->contact_person) ?></td>
                <td><?= h($clients->phone) ?></td>
                <td><?= h($clients->email) ?></td>
                <td><?= h($clients->invoicing_name) ?></td>
                <td><?= h($clients->invoicing_email) ?></td>
                <td><?= h($clients->invoicing_phone) ?></td>
                <td><?= h($clients->created) ?></td>
                <td><?= h($clients->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Location Managers') ?></h4>
        <?php if (!empty($location->location_managers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->location_managers as $locationManagers): ?>
            <tr>
                <td><?= h($locationManagers->id) ?></td>
                <td><?= h($locationManagers->location_id) ?></td>
                <td><?= h($locationManagers->name) ?></td>
                <td><?= h($locationManagers->created) ?></td>
                <td><?= h($locationManagers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LocationManagers', 'action' => 'view', $locationManagers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationManagers', 'action' => 'edit', $locationManagers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationManagers', 'action' => 'delete', $locationManagers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationManagers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
