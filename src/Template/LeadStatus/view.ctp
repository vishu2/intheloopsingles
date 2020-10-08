<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeadStatus $leadStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lead Status'), ['action' => 'edit', $leadStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lead Status'), ['action' => 'delete', $leadStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leadStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lead Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leads'), ['controller' => 'Leads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead'), ['controller' => 'Leads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leadStatus view large-9 medium-8 columns content">
    <h3><?= h($leadStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status Name') ?></th>
            <td><?= h($leadStatus->status_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($leadStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($leadStatus->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($leadStatus->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($leadStatus->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Leads') ?></h4>
        <?php if (!empty($leadStatus->leads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col"><?= __('Lead Type Id') ?></th>
                <th scope="col"><?= __('Lead Source Id') ?></th>
                <th scope="col"><?= __('Lead Status Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Lead Name') ?></th>
                <th scope="col"><?= __('Lead Email') ?></th>
                <th scope="col"><?= __('Lead Phone') ?></th>
                <th scope="col"><?= __('Lead Mobile') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Lead Contact Name') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Converted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($leadStatus->leads as $leads): ?>
            <tr>
                <td><?= h($leads->id) ?></td>
                <td><?= h($leads->client_id) ?></td>
                <td><?= h($leads->lead_type_id) ?></td>
                <td><?= h($leads->lead_source_id) ?></td>
                <td><?= h($leads->lead_status_id) ?></td>
                <td><?= h($leads->location_id) ?></td>
                <td><?= h($leads->lead_name) ?></td>
                <td><?= h($leads->lead_email) ?></td>
                <td><?= h($leads->lead_phone) ?></td>
                <td><?= h($leads->lead_mobile) ?></td>
                <td><?= h($leads->address) ?></td>
                <td><?= h($leads->city) ?></td>
                <td><?= h($leads->state_id) ?></td>
                <td><?= h($leads->country_id) ?></td>
                <td><?= h($leads->lead_contact_name) ?></td>
                <td><?= h($leads->notes) ?></td>
                <td><?= h($leads->converted) ?></td>
                <td><?= h($leads->created) ?></td>
                <td><?= h($leads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Leads', 'action' => 'view', $leads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Leads', 'action' => 'edit', $leads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leads', 'action' => 'delete', $leads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
