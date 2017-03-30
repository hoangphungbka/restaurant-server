<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $billing->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $billing->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Billings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billings form large-9 medium-8 columns content">
    <?= $this->Form->create($billing) ?>
    <fieldset>
        <legend><?= __('Edit Billing') ?></legend>
        <?php
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('total_amount');
            echo $this->Form->control('discount');
            echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
