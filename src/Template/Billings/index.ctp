<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Billing'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billings index large-9 medium-8 columns content">
    <h3><?= __('Billings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($billings as $billing): ?>
            <tr>
                <td><?= $this->Number->format($billing->id) ?></td>
                <td><?= $billing->has('order') ? $this->Html->link($billing->order->id, ['controller' => 'Orders', 'action' => 'view', $billing->order->id]) : '' ?></td>
                <td><?= $this->Number->format($billing->total_amount) ?></td>
                <td><?= $this->Number->format($billing->discount) ?></td>
                <td><?= h($billing->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $billing->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $billing->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $billing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $billing->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
