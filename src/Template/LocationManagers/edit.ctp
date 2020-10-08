<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LocationManager $locationManager
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $locationManager->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $locationManager->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Location Managers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locationManagers form large-9 medium-8 columns content">
    <?= $this->Form->create($locationManager) ?>
    <fieldset>
        <legend><?= __('Edit Location Manager') ?></legend>
        <?php
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
