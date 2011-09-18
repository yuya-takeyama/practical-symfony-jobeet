<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

class unit_JobeetCategoryTest extends sfPHPUnitBaseTestCase
{
    public function testNothing()
    {
        // No tests exist.
    }

    /**
     * JobeetCategory オブジェクトの生成.
     *
     * @param  array $params
     * @return JobeetCategory
     */
    protected function createCategory($params = array())
    {
        $category = new JobeetCategory;
        $category->fromArray($params);
        return $category;
    }
}
