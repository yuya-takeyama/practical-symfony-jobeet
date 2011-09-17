<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

class unit_JobeetTest extends sfPHPUnitBaseTestCase
{
    /**
     * @test
     */
    public function slugify_英数以外の文字列をハイフンに置換する()
    {
        $this->assertSame('foo-bar', Jobeet::slugify('foo$bar'));
    }

    /**
     * @test
     */
    public function slugify_スペースをハイフンに置換する()
    {
        $this->assertSame('foo-bar', Jobeet::slugify('foo bar'));
    }

    /**
     * @test
     */
    public function slugify_英字を小文字に置換する()
    {
        $this->assertSame('foo-bar', Jobeet::slugify('Foo BAR'));
    }

}
