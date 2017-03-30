<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dining Tables'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="diningTables form large-9 medium-8 columns content">
    <?= $this->Form->create($diningTable) ?>
    <fieldset>
        <legend><?= __('Add Dining Table') ?></legend>
        <?php
            echo $this->Form->control('chairs_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
