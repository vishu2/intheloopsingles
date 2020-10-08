<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventRegistration $eventRegistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Registration'), ['action' => 'edit', $eventRegistration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Registration'), ['action' => 'delete', $eventRegistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventRegistration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Registrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Registration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Registration Guests'), ['controller' => 'EventRegistrationGuests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Registration Guest'), ['controller' => 'EventRegistrationGuests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventRegistrations view large-9 medium-8 columns content">
    <h3><?= h($eventRegistration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventRegistration->has('event') ? $this->Html->link($eventRegistration->event->id, ['controller' => 'Events', 'action' => 'view', $eventRegistration->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $eventRegistration->has('user') ? $this->Html->link($eventRegistration->user->id, ['controller' => 'Users', 'action' => 'view', $eventRegistration->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventRegistration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($eventRegistration->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full Paid') ?></th>
            <td><?= $this->Number->format($eventRegistration->full_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Male') ?></th>
            <td><?= $this->Number->format($eventRegistration->male) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Female') ?></th>
            <td><?= $this->Number->format($eventRegistration->female) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($eventRegistration->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($eventRegistration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($eventRegistration->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Event Registration Guests') ?></h4>
        <?php if (!empty($eventRegistration->event_registration_guests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Registration Id') ?></th>
                <th scope="col"><?= __('Guest Name') ?></th>
                <th scope="col"><?= __('Male') ?></th>
                <th scope="col"><?= __('Female') ?></th>
                <th scope="col"><?= __('Craeted') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eventRegistration->event_registration_guests as $eventRegistrationGuests): ?>
            <tr>
                <td><?= h($eventRegistrationGuests->id) ?></td>
                <td><?= h($eventRegistrationGuests->event_registration_id) ?></td>
                <td><?= h($eventRegistrationGuests->guest_name) ?></td>
                <td><?= h($eventRegistrationGuests->male) ?></td>
                <td><?= h($eventRegistrationGuests->female) ?></td>
                <td><?= h($eventRegistrationGuests->craeted) ?></td>
                <td><?= h($eventRegistrationGuests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventRegistrationGuests', 'action' => 'view', $eventRegistrationGuests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventRegistrationGuests', 'action' => 'edit', $eventRegistrationGuests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventRegistrationGuests', 'action' => 'delete', $eventRegistrationGuests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventRegistrationGuests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
