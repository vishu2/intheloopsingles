<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventRegistration[]|\Cake\Collection\CollectionInterface $eventRegistrations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event Registration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Registration Guests'), ['controller' => 'EventRegistrationGuests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Registration Guest'), ['controller' => 'EventRegistrationGuests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventRegistrations index large-9 medium-8 columns content">
    <h3><?= __('Event Registrations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('male') ?></th>
                <th scope="col"><?= $this->Paginator->sort('female') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventRegistrations as $eventRegistration): ?>
            <tr>
                <td><?= $this->Number->format($eventRegistration->id) ?></td>
                <td><?= $eventRegistration->has('event') ? $this->Html->link($eventRegistration->event->id, ['controller' => 'Events', 'action' => 'view', $eventRegistration->event->id]) : '' ?></td>
                <td><?= $eventRegistration->has('user') ? $this->Html->link($eventRegistration->user->id, ['controller' => 'Users', 'action' => 'view', $eventRegistration->user->id]) : '' ?></td>
                <td><?= $this->Number->format($eventRegistration->quantity) ?></td>
                <td><?= $this->Number->format($eventRegistration->full_paid) ?></td>
                <td><?= $this->Number->format($eventRegistration->male) ?></td>
                <td><?= $this->Number->format($eventRegistration->female) ?></td>
                <td><?= $this->Number->format($eventRegistration->status) ?></td>
                <td><?= h($eventRegistration->created) ?></td>
                <td><?= h($eventRegistration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventRegistration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventRegistration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventRegistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventRegistration->id)]) ?>
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
