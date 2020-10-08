<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeadType $leadType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $leadType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $leadType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lead Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leads'), ['controller' => 'Leads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['controller' => 'Leads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leadTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($leadType) ?>
    <fieldset>
        <legend><?= __('Edit Lead Type') ?></legend>
        <?php
            echo $this->Form->control('lead_type_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
