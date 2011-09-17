<?php
include dirname(__FILE__) . '/../bootstrap/Doctrine.php';
require_once dirname(__FILE__).'/../bootstrap/unit.php';

class unit_JobeetJobTest extends sfPHPUnitBaseTestCase
{
    protected $job;

    public function _start()
    {
        new sfDatabaseManager(ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true));
        Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');
    }

    /**
     * @test
     * @expectedException Doctrine_Record_UnknownPropertyException
     */
    public function 存在しないメソッドを呼んだら例外を投げる()
    {
        $this->createJob()->callUndefinedMethod();
    }

    /**
     * @test
     */
    public function getCompanySlug_slugifyされた企業名を取得する()
    {
        $job = Doctrine::getTable('JobeetJob')->createQuery()->fetchOne();
        $this->assertSame('sensio-labs', $job->getCompanySlug());
    }

    /**
     * @test
     */
    public function getPositionSlug_slugifyされた役職名を取得する()
    {
        $job = $this->createJob(array(
            'position' => 'Web Programmer',
        ));
        $this->assertSame('web-programmer', $job->getPositionSlug());
    }

    /**
     * @test
     */
    public function getLocationSlug_slugifyされた地域名を取得する()
    {
        $job = $this->createJob(array(
            'location' => 'Paris, France',
        ));
        $this->assertSame('paris-france', $job->getLocationSlug());
    }

    /**
     * JobeetJob オブジェクトの生成.
     *
     * @param  array $params
     * @return JobeetJob
     */
    protected function createJob($params = array())
    {
        $job = new JobeetJob;
        $job->fromArray(array_merge(array(
            'category_id'  => 1,
            'company'      => 'Sensio Labs',
            'position'     => 'Senior Tester',
            'location'     => 'Paris, France',
            'description'  => 'Testing is fun',
            'how_to_apply' => 'Send e-Mail',
            'email'        => 'job@example.com',
            'token'        => rand(1111, 9999),
            'is_activated' => true,
        ), $params));
        return $job;
    }
}
