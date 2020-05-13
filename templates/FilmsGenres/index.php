<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmsGenre[]|\Cake\Collection\CollectionInterface $filmsGenres
 */
?>
<div class="filmsGenres index content">
    <?= $this->Html->link(__('New Films Genre'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Films Genres') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('genre_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmsGenres as $filmsGenre): ?>
                <tr>
                    <td><?= $this->Number->format($filmsGenre->id) ?></td>
                    <td><?= $filmsGenre->has('film') ? $this->Html->link($filmsGenre->film->title, ['controller' => 'Films', 'action' => 'view', $filmsGenre->film->id]) : '' ?></td>
                    <td><?= $filmsGenre->has('genre') ? $this->Html->link($filmsGenre->genre->name, ['controller' => 'Genres', 'action' => 'view', $filmsGenre->genre->id]) : '' ?></td>
                    <td><?= h($filmsGenre->created) ?></td>
                    <td><?= h($filmsGenre->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filmsGenre->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filmsGenre->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filmsGenre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmsGenre->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
