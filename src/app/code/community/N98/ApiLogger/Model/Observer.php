<?php

class N98_ApiLogger_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function controllerActionPredispatchApiSoapIndex(Varien_Event_Observer $observer)
    {
        $request = $observer->getControllerAction()->getRequest();
        /* @var $request Mage_Core_Controller_Request_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $request->getRawBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_IN,
                'http_status_code' => null,
                'http_method'      => $request->getMethod(),
            )
        );
    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function controllerActionPredispatchApiV2SoapIndex(Varien_Event_Observer $observer)
    {
        $request = $observer->getControllerAction()->getRequest();
        /* @var $request Mage_Core_Controller_Request_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $request->getRawBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_IN,
                'http_status_code' => null,
                'http_method'      => $request->getMethod(),
            )
        );
    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function controllerActionPostdispatchApiSoapIndex(Varien_Event_Observer $observer)
    {
        $response  = $observer->getControllerAction()->getResponse();
        /* @var $response Mage_Core_Controller_Response_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $response->getBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_OUT,
                'http_status_code' => $response->getHttpResponseCode(),
                'http_method'      => '',
            )
        );
    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function controllerActionPostdispatchApiV2SoapIndex(Varien_Event_Observer $observer)
    {
        $response  = $observer->getControllerAction()->getResponse();
        /* @var $response Mage_Core_Controller_Response_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $response->getBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_OUT,
                'http_status_code' => $response->getHttpResponseCode(),
                'http_method'      => '',
            )
        );
    }
}