<?php

class N98_ApiLogger_Test_Model_Log extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var N98_ApiLogger_Model_Log
     */
    protected $model = null;

    protected function setUp()
    {
        parent::setUp();
        $this->model = Mage::getModel('n98_apilogger/log');
    }

    /**
     * @test
     */
    public function save()
    {
        $this->model->addData(
            array(
                'body'             => 'test',
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_IN,
                'http_method'      => 'POST',
                'http_status_code' => 200,
            )
        );
        $this->model->save();

        $this->assertNotNull($this->model->getId());
    }
}