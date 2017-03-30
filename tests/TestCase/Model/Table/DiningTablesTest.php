<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiningTables;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiningTables Test Case
 */
class DiningTablesTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiningTables
     */
    public $DiningTables;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dinings') ? [] : ['className' => 'App\Model\Table\DiningTables'];
        $this->DiningTables = TableRegistry::get('Dinings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DiningTables);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
