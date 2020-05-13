<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actor $actor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actor'), ['action' => 'edit', $actor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actor'), ['action' => 'delete', $actor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actors view content">
            <h3><?= h($actor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($actor->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($actor->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($actor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($actor->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Films') ?></h4>
                <?php if (!empty($actor->films)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Director') ?></th>
                            <th><?= __('Duration') ?></th>
                            <th><?= __('Release Year') ?></th>
                            <th><?= __('Stars') ?></th>
                            <th><?= __('Tags') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($actor->films as $films) : ?>
                        <tr>
                            <td><?= h($films->id) ?></td>
                            <td><?= h($films->title) ?></td>
                            <td><?= h($films->description) ?></td>
                            <td><?= h($films->director) ?></td>
                            <td><?= h($films->duration) ?></td>
                            <td><?= h($films->release_year) ?></td>
                            <td><?= h($films->stars) ?></td>
                            <td><?= h($films->tags) ?></td>
                            <td><?= h($films->created) ?></td>
                            <td><?= h($films->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Films', 'action' => 'view', $films->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Films', 'action' => 'edit', $films->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Films', 'action' => 'delete', $films->id], ['confirm' => __('Are you sure you want to delete # {0}?', $films->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
