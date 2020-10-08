<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lead $lead
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lead'), ['action' => 'edit', $lead->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lead'), ['action' => 'delete', $lead->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lead->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lead Types'), ['controller' => 'LeadTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead Type'), ['controller' => 'LeadTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lead Sources'), ['controller' => 'LeadSources', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead Source'), ['controller' => 'LeadSources', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leads view large-9 medium-8 columns content">
    <h3><?= h($lead->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $lead->has('client') ? $this->Html->link($lead->client->client_name, ['controller' => 'Clients', 'action' => 'view', $lead->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Type') ?></th>
            <td><?= $lead->has('lead_type') ? $this->Html->link($lead->lead_type->id, ['controller' => 'LeadTypes', 'action' => 'view', $lead->lead_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Source') ?></th>
            <td><?= $lead->has('lead_source') ? $this->Html->link($lead->lead_source->id, ['controller' => 'LeadSources', 'action' => 'view', $lead->lead_source->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $lead->has('location') ? $this->Html->link($lead->location->name, ['controller' => 'Locations', 'action' => 'view', $lead->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Name') ?></th>
            <td><?= h($lead->lead_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Email') ?></th>
            <td><?= h($lead->lead_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Phone') ?></th>
            <td><?= h($lead->lead_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Mobile') ?></th>
            <td><?= h($lead->lead_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($lead->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($lead->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $lead->has('state') ? $this->Html->link($lead->state->id, ['controller' => 'States', 'action' => 'view', $lead->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $lead->has('country') ? $this->Html->link($lead->country->id, ['controller' => 'Countries', 'action' => 'view', $lead->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Contact Name') ?></th>
            <td><?= h($lead->lead_contact_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lead->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lead Status Id') ?></th>
            <td><?= $this->Number->format($lead->lead_status_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Converted') ?></th>
            <td><?= h($lead->converted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lead->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lead->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($lead->notes)); ?>
    </div>
</div>
