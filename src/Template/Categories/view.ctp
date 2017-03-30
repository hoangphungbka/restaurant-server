<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Menu Items') ?></h4>
        <?php if (!empty($category->menu_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->menu_items as $menuItems): ?>
            <tr>
                <td><?= h($menuItems->id) ?></td>
                <td><?= h($menuItems->name) ?></td>
                <td><?= h($menuItems->price) ?></td>
                <td><?= h($menuItems->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MenuItems', 'action' => 'view', $menuItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MenuItems', 'action' => 'edit', $menuItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MenuItems', 'action' => 'delete', $menuItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
