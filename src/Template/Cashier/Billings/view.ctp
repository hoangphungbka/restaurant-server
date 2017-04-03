<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Billing'), ['action' => 'edit', $billing->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Billing'), ['action' => 'delete', $billing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $billing->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Billings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Billing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="billings view large-9 medium-8 columns content">
    <h3><?= h($billing->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $billing->has('order') ? $this->Html->link($billing->order->id, ['controller' => 'Orders', 'action' => 'view', $billing->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($billing->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($billing->total_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($billing->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($billing->created_at) ?></td>
        </tr>
    </table>
</div>
