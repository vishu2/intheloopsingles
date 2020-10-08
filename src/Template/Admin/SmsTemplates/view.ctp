<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SmsTemplate $smsTemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sms Template'), ['action' => 'edit', $smsTemplate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sms Template'), ['action' => 'delete', $smsTemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $smsTemplate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sms Templates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sms Template'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="smsTemplates view large-9 medium-8 columns content">
    <h3><?= h($smsTemplate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($smsTemplate->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Template For') ?></th>
            <td><?= h($smsTemplate->template_for) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($smsTemplate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($smsTemplate->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($smsTemplate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($smsTemplate->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Template Body') ?></h4>
        <?= $this->Text->autoParagraph(h($smsTemplate->template_body)); ?>
    </div>
</div>
