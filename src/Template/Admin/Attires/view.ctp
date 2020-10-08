<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attire $attire
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attire'), ['action' => 'edit', $attire->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attire'), ['action' => 'delete', $attire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attire->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attires'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attire'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attires view large-9 medium-8 columns content">
    <h3><?= h($attire->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Attire Name') ?></th>
            <td><?= h($attire->attire_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attire->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($attire->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($attire->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($attire->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($attire->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Name') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Cancellation Date') ?></th>
                <th scope="col"><?= __('Venue Name') ?></th>
                <th scope="col"><?= __('Venue Address') ?></th>
                <th scope="col"><?= __('Venue Address2') ?></th>
                <th scope="col"><?= __('Event Description') ?></th>
                <th scope="col"><?= __('Event Photo') ?></th>
                <th scope="col"><?= __('Event Cancel Date') ?></th>
                <th scope="col"><?= __('Event Fee') ?></th>
                <th scope="col"><?= __('Event Fee Description') ?></th>
                <th scope="col"><?= __('Attire Id') ?></th>
                <th scope="col"><?= __('Registration Close Date') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Member Limit') ?></th>
                <th scope="col"><?= __('Registration Limit') ?></th>
                <th scope="col"><?= __('Male Limit') ?></th>
                <th scope="col"><?= __('Female Limit') ?></th>
                <th scope="col"><?= __('Cancelled') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Credit') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Event Color') ?></th>
                <th scope="col"><?= __('Event Cost') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attire->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->event_name) ?></td>
                <td><?= h($events->start_date) ?></td>
                <td><?= h($events->end_date) ?></td>
                <td><?= h($events->cancellation_date) ?></td>
                <td><?= h($events->venue_name) ?></td>
                <td><?= h($events->venue_address) ?></td>
                <td><?= h($events->venue_address2) ?></td>
                <td><?= h($events->event_description) ?></td>
                <td><?= h($events->event_photo) ?></td>
                <td><?= h($events->event_cancel_date) ?></td>
                <td><?= h($events->event_fee) ?></td>
                <td><?= h($events->event_fee_description) ?></td>
                <td><?= h($events->attire_id) ?></td>
                <td><?= h($events->registration_close_date) ?></td>
                <td><?= h($events->quantity) ?></td>
                <td><?= h($events->member_limit) ?></td>
                <td><?= h($events->registration_limit) ?></td>
                <td><?= h($events->male_limit) ?></td>
                <td><?= h($events->female_limit) ?></td>
                <td><?= h($events->cancelled) ?></td>
                <td><?= h($events->published) ?></td>
                <td><?= h($events->credit) ?></td>
                <td><?= h($events->notes) ?></td>
                <td><?= h($events->vendor_id) ?></td>
                <td><?= h($events->event_color) ?></td>
                <td><?= h($events->event_cost) ?></td>
                <td><?= h($events->location_id) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
