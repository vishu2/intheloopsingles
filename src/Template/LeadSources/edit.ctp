<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeadSource $leadSource
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $leadSource->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $leadSource->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lead Sources'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leads'), ['controller' => 'Leads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['controller' => 'Leads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leadSources form large-9 medium-8 columns content">
    <?= $this->Form->create($leadSource) ?>
    <fieldset>
        <legend><?= __('Edit Lead Source') ?></legend>
        <?php
            echo $this->Form->control('source_name');
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('source_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
