<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuItemsTable Test Case
 */
class MenuItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuItemsTable
     */
    public $MenuItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.menu_items',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MenuItems') ? [] : ['className' => 'App\Model\Table\MenuItemsTable'];
        $this->MenuItems = TableRegistry::get('MenuItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenuItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
