<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelRegistration $travelRegistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $travelRegistration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $travelRegistration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Travel Registrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Travel Registration Guests'), ['controller' => 'TravelRegistrationGuests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel Registration Guest'), ['controller' => 'TravelRegistrationGuests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="travelRegistrations form large-9 medium-8 columns content">
    <?= $this->Form->create($travelRegistration) ?>
    <fieldset>
        <legend><?= __('Edit Travel Registration') ?></legend>
        <?php
            echo $this->Form->control('travel_id', ['options' => $travels]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('single');
            echo $this->Form->control('shared');
            echo $this->Form->control('deposit_paid');
            echo $this->Form->control('full_paid');
            echo $this->Form->control('comp');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
