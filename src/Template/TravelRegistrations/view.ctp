<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelRegistration $travelRegistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Travel Registration'), ['action' => 'edit', $travelRegistration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Travel Registration'), ['action' => 'delete', $travelRegistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelRegistration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Travel Registrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel Registration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Travel Registration Guests'), ['controller' => 'TravelRegistrationGuests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel Registration Guest'), ['controller' => 'TravelRegistrationGuests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="travelRegistrations view large-9 medium-8 columns content">
    <h3><?= h($travelRegistration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Travel') ?></th>
            <td><?= $travelRegistration->has('travel') ? $this->Html->link($travelRegistration->travel->id, ['controller' => 'Travels', 'action' => 'view', $travelRegistration->travel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $travelRegistration->has('user') ? $this->Html->link($travelRegistration->user->id, ['controller' => 'Users', 'action' => 'view', $travelRegistration->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($travelRegistration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Single') ?></th>
            <td><?= $this->Number->format($travelRegistration->single) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shared') ?></th>
            <td><?= $this->Number->format($travelRegistration->shared) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposit Paid') ?></th>
            <td><?= $this->Number->format($travelRegistration->deposit_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full Paid') ?></th>
            <td><?= $this->Number->format($travelRegistration->full_paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comp') ?></th>
            <td><?= $this->Number->format($travelRegistration->comp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($travelRegistration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($travelRegistration->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Travel Registration Guests') ?></h4>
        <?php if (!empty($travelRegistration->travel_registration_guests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Travel Registration Id') ?></th>
                <th scope="col"><?= __('Guest Name') ?></th>
                <th scope="col"><?= __('Male') ?></th>
                <th scope="col"><?= __('Female') ?></th>
                <th scope="col"><?= __('Craeted') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($travelRegistration->travel_registration_guests as $travelRegistrationGuests): ?>
            <tr>
                <td><?= h($travelRegistrationGuests->id) ?></td>
                <td><?= h($travelRegistrationGuests->travel_registration_id) ?></td>
                <td><?= h($travelRegistrationGuests->guest_name) ?></td>
                <td><?= h($travelRegistrationGuests->male) ?></td>
                <td><?= h($travelRegistrationGuests->female) ?></td>
                <td><?= h($travelRegistrationGuests->craeted) ?></td>
                <td><?= h($travelRegistrationGuests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TravelRegistrationGuests', 'action' => 'view', $travelRegistrationGuests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TravelRegistrationGuests', 'action' => 'edit', $travelRegistrationGuests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TravelRegistrationGuests', 'action' => 'delete', $travelRegistrationGuests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelRegistrationGuests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
