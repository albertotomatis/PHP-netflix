<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActorsFilm[]|\Cake\Collection\CollectionInterface $actorsFilms
 */
?>
<div class="actorsFilms index content">
    <?= $this->Html->link(__('New Actors Film'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actors Films') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('actor_id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actorsFilms as $actorsFilm): ?>
                <tr>
                    <td><?= $this->Number->format($actorsFilm->id) ?></td>
                    <td><?= $actorsFilm->has('actor') ? $this->Html->link($actorsFilm->actor->id, ['controller' => 'Actors', 'action' => 'view', $actorsFilm->actor->id]) : '' ?></td>
                    <td><?= $actorsFilm->has('film') ? $this->Html->link($actorsFilm->film->title, ['controller' => 'Films', 'action' => 'view', $actorsFilm->film->id]) : '' ?></td>
                    <td><?= h($actorsFilm->created) ?></td>
                    <td><?= h($actorsFilm->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actorsFilm->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actorsFilm->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actorsFilm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsFilm->id)]) ?>
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
