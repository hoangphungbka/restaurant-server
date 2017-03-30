<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Detail'), ['action' => 'edit', $orderDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Detail'), ['action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderDetails view large-9 medium-8 columns content">
    <h3><?= h($orderDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Item') ?></th>
            <td><?= $orderDetail->has('menu_item') ? $this->Html->link($orderDetail->menu_item->name, ['controller' => 'MenuItems', 'action' => 'view', $orderDetail->menu_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->id, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($orderDetail->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($orderDetail->amount) ?></td>
        </tr>
    </table>
</div>
