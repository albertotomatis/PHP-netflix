<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActorsFilm $actorsFilm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Actors Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actorsFilms form content">
            <?= $this->Form->create($actorsFilm) ?>
            <fieldset>
                <legend><?= __('Add Actors Film') ?></legend>
                <?php
                    echo $this->Form->control('actor_id', ['options' => $actors]);
                    echo $this->Form->control('film_id', ['options' => $films]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
