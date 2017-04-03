<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dining Table'), ['action' => 'edit', $diningTable->table_number]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dining Table'), ['action' => 'delete', $diningTable->table_number], ['confirm' => __('Are you sure you want to delete # {0}?', $diningTable->table_number)]) ?> </li>
        <li><?= $this->Html->link(__('List Dining Tables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dining Table'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diningTables view large-9 medium-8 columns content">
    <h3><?= h($diningTable->table_number) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Table Number') ?></th>
            <td><?= $this->Number->format($diningTable->table_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chairs Count') ?></th>
            <td><?= $this->Number->format($diningTable->chairs_count) ?></td>
        </tr>
    </table>
</div>
