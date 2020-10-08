<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hours'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hours form large-9 medium-8 columns content">
    <?= $this->Form->create($hour) ?>
    <fieldset>
        <legend><?= __('Add Hour') ?></legend>
        <?php
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('day');
            echo $this->Form->control('timing');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
