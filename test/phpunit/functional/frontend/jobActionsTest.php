<?php
require_once dirname(__FILE__).'/../../bootstrap/functional.php';

class functional_frontend_jobActionsTest extends sfPHPUnitBaseFunctionalTestCase
{
    protected function getApplication()
    {
        return 'frontend';
    }

    /**
     * @test
     */
    public function ホームページはJobの一覧である()
    {
        $browser = $this->getBrowser();

        $browser->
            get('/')->

        with('request')->begin()->
            isParameter('module', 'job')->
            isParameter('action', 'index')->
        end()->

        with('response')->begin()->
            isStatusCode(200)->
            checkElement('title', '/Jobeet - Your best job board/')->
        end();
    }
}
