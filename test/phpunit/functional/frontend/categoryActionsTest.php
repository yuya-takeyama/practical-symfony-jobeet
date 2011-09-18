<?php
require_once dirname(__FILE__).'/../../bootstrap/functional.php';

class functional_frontend_categoryActionsTest extends sfPHPUnitBaseFunctionalTestCase
{
    protected function getApplication()
    {
        return 'frontend';
    }

    /**
     * @test
     */
    public function インデックスページは存在しない()
    {
        $browser = $this->getBrowser();

        $browser->
            get('/category')->

        with('response')->begin()->
            isStatusCode(404)->
        end();
    }
}
