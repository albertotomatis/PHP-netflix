<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmsGenre $filmsGenre
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Films Genres'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmsGenres form content">
            <?= $this->Form->create($filmsGenre) ?>
            <fieldset>
                <legend><?= __('Add Films Genre') ?></legend>
                <?php
                    echo $this->Form->control('film_id', ['options' => $films]);
                    echo $this->Form->control('genre_id', ['options' => $genres]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
