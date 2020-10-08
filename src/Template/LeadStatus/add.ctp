<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeadStatus $leadStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lead Status'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leads'), ['controller' => 'Leads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['controller' => 'Leads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leadStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($leadStatus) ?>
    <fieldset>
        <legend><?= __('Add Lead Status') ?></legend>
        <?php
            echo $this->Form->control('status_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
