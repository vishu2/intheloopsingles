<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FooterContact $footerContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Footer Contact'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="footerContact form large-9 medium-8 columns content">
    <?= $this->Form->create($footerContact) ?>
    <fieldset>
        <legend><?= __('Add Footer Contact') ?></legend>
        <?php
            echo $this->Form->control('location');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
