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
                ['action' => 'delete', $diningTable->table_number],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diningTable->table_number)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dining Tables'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="diningTables form large-9 medium-8 columns content">
    <?= $this->Form->create($diningTable) ?>
    <fieldset>
        <legend><?= __('Edit Dining Table') ?></legend>
        <?php
            echo $this->Form->control('chairs_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
