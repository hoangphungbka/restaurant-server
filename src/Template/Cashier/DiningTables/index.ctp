<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dining Table'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diningTables index large-9 medium-8 columns content">
    <h3><?= __('Dining Tables') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('table_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chairs_count') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diningTables as $diningTable): ?>
            <tr>
                <td><?= $this->Number->format($diningTable->table_number) ?></td>
                <td><?= $this->Number->format($diningTable->chairs_count) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $diningTable->table_number]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diningTable->table_number]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diningTable->table_number], ['confirm' => __('Are you sure you want to delete # {0}?', $diningTable->table_number)]) ?>
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
