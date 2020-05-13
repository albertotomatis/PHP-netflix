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
            <?= $this->Html->link(__('Edit Actors Film'), ['action' => 'edit', $actorsFilm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actors Film'), ['action' => 'delete', $actorsFilm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsFilm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actors Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actors Film'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actorsFilms view content">
            <h3><?= h($actorsFilm->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Actor') ?></th>
                    <td><?= $actorsFilm->has('actor') ? $this->Html->link($actorsFilm->actor->id, ['controller' => 'Actors', 'action' => 'view', $actorsFilm->actor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $actorsFilm->has('film') ? $this->Html->link($actorsFilm->film->title, ['controller' => 'Films', 'action' => 'view', $actorsFilm->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actorsFilm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($actorsFilm->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($actorsFilm->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
