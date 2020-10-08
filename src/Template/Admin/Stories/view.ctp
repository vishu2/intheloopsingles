<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Story $story
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Story'), ['action' => 'edit', $story->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Story'), ['action' => 'delete', $story->id], ['confirm' => __('Are you sure you want to delete # {0}?', $story->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Story'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stories view large-9 medium-8 columns content">
    <h3><?= h($story->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member Name') ?></th>
            <td><?= h($story->member_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Story Image') ?></th>
            <td><?= h($story->story_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($story->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($story->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($story->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Story Content') ?></h4>
        <?= $this->Text->autoParagraph(h($story->story_content)); ?>
    </div>
</div>
