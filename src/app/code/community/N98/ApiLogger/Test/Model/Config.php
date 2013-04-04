<?php

class N98_ApiLogger_Test_Model_Config extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var N98_ApiLogger_Model_Config
     */
    protected $model = null;

    protected function setUp()
    {
        parent::setUp();
        $this->model = Mage::getModel('n98_apilogger/config');
    }

    /**
     * Check default value
     *
     * @test
     */
    public function isSoapLogActiveDefault()
    {
        $this->assertFalse($this->model->isSoapLogActive());
    }

    /**
     * @test
     * @loadFixture
     */
    public function isSoapLogActiveYes()
    {
        $this->assertTrue($this->model->isSoapLogActive());
    }

    /**
     * @test
     * @loadFixture
     */
    public function isSoapLogActiveNo()
    {
        $this->assertFalse($this->model->isSoapLogActive());
    }

    /**
     * Check default value
     *
     * @test
     */
    public function isSoapV2LogActiveDefault()
    {
        $this->assertFalse($this->model->isSoapV2LogActive());
    }

    /**
     * @test
     * @loadFixture
     */
    public function isSoapV2LogActiveYes()
    {
        $this->assertTrue($this->model->isSoapV2LogActive());
    }

    /**
     * @test
     * @loadFixture
     */
    public function isSoapV2LogActiveNo()
    {
        $this->assertFalse($this->model->isSoapV2LogActive());
    }
}