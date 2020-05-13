<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Film Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $director
 * @property string $duration
 * @property int $release_year
 * @property int $stars
 * @property string $tags
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Actor[] $actors
 * @property \App\Model\Entity\Genre[] $genres
 */
class Film extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'director' => true,
        'duration' => true,
        'release_year' => true,
        'stars' => true,
        'tags' => true,
        'created' => true,
        'modified' => true,
        'actors' => true,
        'genres' => true,
    ];
}
