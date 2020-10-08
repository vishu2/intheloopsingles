<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SmsTemplate $smsTemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sms Templates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="smsTemplates form large-9 medium-8 columns content">
    <?= $this->Form->create($smsTemplate) ?>
    <fieldset>
        <legend><?= __('Add Sms Template') ?></legend>
        <?php
            echo $this->Form->control('subject');
            echo $this->Form->control('template_for');
            echo $this->Form->control('template_body');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
