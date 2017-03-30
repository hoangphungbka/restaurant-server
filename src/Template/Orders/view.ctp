<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Billings'), ['controller' => 'Billings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Billing'), ['controller' => 'Billings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $order->has('employee') ? $this->Html->link($order->employee->id, ['controller' => 'Employees', 'action' => 'view', $order->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Table Number') ?></th>
            <td><?= $this->Number->format($order->table_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($order->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($order->updated_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Billings') ?></h4>
        <?php if (!empty($order->billings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->billings as $billings): ?>
            <tr>
                <td><?= h($billings->id) ?></td>
                <td><?= h($billings->order_id) ?></td>
                <td><?= h($billings->total_amount) ?></td>
                <td><?= h($billings->discount) ?></td>
                <td><?= h($billings->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Billings', 'action' => 'view', $billings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Billings', 'action' => 'edit', $billings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Billings', 'action' => 'delete', $billings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $billings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Details') ?></h4>
        <?php if (!empty($order->order_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_details as $orderDetails): ?>
            <tr>
                <td><?= h($orderDetails->id) ?></td>
                <td><?= h($orderDetails->item_id) ?></td>
                <td><?= h($orderDetails->order_id) ?></td>
                <td><?= h($orderDetails->quantity) ?></td>
                <td><?= h($orderDetails->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetails', 'action' => 'delete', $orderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
