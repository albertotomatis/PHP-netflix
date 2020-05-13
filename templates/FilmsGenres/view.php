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
            <?= $this->Html->link(__('Edit Films Genre'), ['action' => 'edit', $filmsGenre->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Films Genre'), ['action' => 'delete', $filmsGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmsGenre->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Films Genres'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Films Genre'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmsGenres view content">
            <h3><?= h($filmsGenre->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $filmsGenre->has('film') ? $this->Html->link($filmsGenre->film->title, ['controller' => 'Films', 'action' => 'view', $filmsGenre->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Genre') ?></th>
                    <td><?= $filmsGenre->has('genre') ? $this->Html->link($filmsGenre->genre->name, ['controller' => 'Genres', 'action' => 'view', $filmsGenre->genre->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filmsGenre->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($filmsGenre->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($filmsGenre->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
