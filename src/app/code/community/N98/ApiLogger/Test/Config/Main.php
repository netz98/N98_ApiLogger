<?php

class N98_ApiLogger_Test_Config_Main extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testHelpers()
    {
        $this->assertHelperAlias('n98_apilogger', 'N98_ApiLogger_Helper_Data');
    }

    public function testModels()
    {
        $this->assertModelAlias('n98_apilogger/observer', 'N98_ApiLogger_Model_Observer');
        $this->assertModelAlias('n98_apilogger/config', 'N98_ApiLogger_Model_Config');
    }

    public function testResource()
    {
        $this->assertSetupResourceDefined();
        $this->assertSetupResourceExists();
    }

    public function testEvents()
    {
        $this->assertEventObserverDefined(
            'frontend',
            'controller_action_predispatch_api_soap_index',
            'n98_apilogger/observer',
            'controllerActionPredispatchApiSoapIndex'
        );

        $this->assertEventObserverDefined(
            'frontend',
            'controller_action_postdispatch_api_soap_index',
            'n98_apilogger/observer',
            'controllerActionPostdispatchApiSoapIndex'
        );

        $this->assertEventObserverDefined(
            'frontend',
            'controller_action_predispatch_api_v2_soap_index',
            'n98_apilogger/observer',
            'controllerActionPredispatchApiV2SoapIndex'
        );

        $this->assertEventObserverDefined(
            'frontend',
            'controller_action_postdispatch_api_v2_soap_index',
            'n98_apilogger/observer',
            'controllerActionPostdispatchApiV2SoapIndex'
        );
    }
}