<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films form content">
            <?= $this->Form->create($film) ?>
            <fieldset>
                <legend><?= __('Add Film') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('director');
                    echo $this->Form->control('duration');
                    echo $this->Form->control('release_year');
                    echo $this->Form->control('stars');
                    echo $this->Form->control('tags');
                    echo $this->Form->control('actors._ids', ['options' => $actors]);
                    echo $this->Form->control('genres._ids', ['options' => $genres]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
