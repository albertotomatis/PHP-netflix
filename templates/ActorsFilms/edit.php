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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actorsFilm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actorsFilm->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Actors Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actorsFilms form content">
            <?= $this->Form->create($actorsFilm) ?>
            <fieldset>
                <legend><?= __('Edit Actors Film') ?></legend>
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
