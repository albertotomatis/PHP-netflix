<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Films Model
 *
 * @property \App\Model\Table\ActorsTable&\Cake\ORM\Association\BelongsToMany $Actors
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsToMany $Genres
 *
 * @method \App\Model\Entity\Film newEmptyEntity()
 * @method \App\Model\Entity\Film newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Film[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Film get($primaryKey, $options = [])
 * @method \App\Model\Entity\Film findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Film patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Film[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Film|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilmsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('films');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Actors', [
            'foreignKey' => 'film_id',
            'targetForeignKey' => 'actor_id',
            'joinTable' => 'actors_films',
        ]);
        $this->belongsToMany('Genres', [
            'foreignKey' => 'film_id',
            'targetForeignKey' => 'genre_id',
            'joinTable' => 'films_genres',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 64)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('director')
            ->maxLength('director', 64)
            ->requirePresence('director', 'create')
            ->notEmptyString('director');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 32)
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->requirePresence('release_year', 'create')
            ->notEmptyString('release_year');

        $validator
            ->requirePresence('stars', 'create')
            ->notEmptyString('stars');

        $validator
            ->scalar('tags')
            ->requirePresence('tags', 'create')
            ->notEmptyString('tags');

        return $validator;
    }
}
