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
            <?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films view content">
            <h3><?= h($film->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($film->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Director') ?></th>
                    <td><?= h($film->director) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration') ?></th>
                    <td><?= h($film->duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($film->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Year') ?></th>
                    <td><?= $this->Number->format($film->release_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stars') ?></th>
                    <td><?= $this->Number->format($film->stars) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($film->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($film->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($film->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Tags') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($film->tags)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Actors') ?></h4>
                <?php if (!empty($film->actors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($film->actors as $actors) : ?>
                        <tr>
                            <td><?= h($actors->id) ?></td>
                            <td><?= h($actors->firstname) ?></td>
                            <td><?= h($actors->lastname) ?></td>
                            <td><?= h($actors->created) ?></td>
                            <td><?= h($actors->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Actors', 'action' => 'view', $actors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Actors', 'action' => 'edit', $actors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actors', 'action' => 'delete', $actors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Genres') ?></h4>
                <?php if (!empty($film->genres)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($film->genres as $genres) : ?>
                        <tr>
                            <td><?= h($genres->id) ?></td>
                            <td><?= h($genres->name) ?></td>
                            <td><?= h($genres->created) ?></td>
                            <td><?= h($genres->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Genres', 'action' => 'view', $genres->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Genres', 'action' => 'edit', $genres->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Genres', 'action' => 'delete', $genres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genres->id)]) ?>
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
