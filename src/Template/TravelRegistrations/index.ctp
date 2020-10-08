<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelRegistration[]|\Cake\Collection\CollectionInterface $travelRegistrations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Travel Registration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Travel Registration Guests'), ['controller' => 'TravelRegistrationGuests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel Registration Guest'), ['controller' => 'TravelRegistrationGuests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="travelRegistrations index large-9 medium-8 columns content">
    <h3><?= __('Travel Registrations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('travel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('single') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shared') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposit_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($travelRegistrations as $travelRegistration): ?>
            <tr>
                <td><?= $this->Number->format($travelRegistration->id) ?></td>
                <td><?= $travelRegistration->has('travel') ? $this->Html->link($travelRegistration->travel->id, ['controller' => 'Travels', 'action' => 'view', $travelRegistration->travel->id]) : '' ?></td>
                <td><?= $travelRegistration->has('user') ? $this->Html->link($travelRegistration->user->id, ['controller' => 'Users', 'action' => 'view', $travelRegistration->user->id]) : '' ?></td>
                <td><?= $this->Number->format($travelRegistration->single) ?></td>
                <td><?= $this->Number->format($travelRegistration->shared) ?></td>
                <td><?= $this->Number->format($travelRegistration->deposit_paid) ?></td>
                <td><?= $this->Number->format($travelRegistration->full_paid) ?></td>
                <td><?= $this->Number->format($travelRegistration->comp) ?></td>
                <td><?= h($travelRegistration->created) ?></td>
                <td><?= h($travelRegistration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $travelRegistration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $travelRegistration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelRegistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelRegistration->id)]) ?>
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
