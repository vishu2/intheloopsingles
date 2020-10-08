<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadSourcesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadSourcesTable Test Case
 */
class LeadSourcesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadSourcesTable
     */
    public $LeadSources;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LeadSources',
        'app.Locations',
        'app.Leads',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LeadSources') ? [] : ['className' => LeadSourcesTable::class];
        $this->LeadSources = TableRegistry::getTableLocator()->get('LeadSources', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeadSources);

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
