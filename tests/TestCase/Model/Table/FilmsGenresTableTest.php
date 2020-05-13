<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmsGenresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmsGenresTable Test Case
 */
class FilmsGenresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmsGenresTable
     */
    protected $FilmsGenres;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FilmsGenres',
        'app.Films',
        'app.Genres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FilmsGenres') ? [] : ['className' => FilmsGenresTable::class];
        $this->FilmsGenres = TableRegistry::getTableLocator()->get('FilmsGenres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FilmsGenres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
