<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventRegistration $eventRegistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Event Registrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Registration Guests'), ['controller' => 'EventRegistrationGuests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Registration Guest'), ['controller' => 'EventRegistrationGuests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventRegistrations form large-9 medium-8 columns content">
    <?= $this->Form->create($eventRegistration) ?>
    <fieldset>
        <legend><?= __('Add Event Registration') ?></legend>
        <?php
            echo $this->Form->control('event_id', ['options' => $events]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('full_paid');
            echo $this->Form->control('male');
            echo $this->Form->control('female');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
