<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

class unit_JobeetCategoryTest extends sfPHPUnitBaseTestCase
{
    /**
     * @test
     */
    public function getSlug_slugifyされたカテゴリ名を取得する()
    {
        $category = $this->createCategory(array(
            'name' => 'Web Programmer',
        ));
        $this->assertSame('web-programmer', $category->getSlug());
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
