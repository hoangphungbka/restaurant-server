<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Billings'), ['controller' => 'Billings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Billing'), ['controller' => 'Billings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('table_number');
            echo $this->Form->control('employee_id', ['options' => $employees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
