<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu Item'), ['action' => 'edit', $menuItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu Item'), ['action' => 'delete', $menuItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menuItems view large-9 medium-8 columns content">
    <h3><?= h($menuItem->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($menuItem->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $menuItem->has('category') ? $this->Html->link($menuItem->category->name, ['controller' => 'Categories', 'action' => 'view', $menuItem->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($menuItem->price) ?></td>
        </tr>
    </table>
</div>
