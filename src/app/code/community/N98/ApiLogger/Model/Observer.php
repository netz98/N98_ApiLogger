<?php

class N98_ApiLogger_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function controllerActionPredispatchApiSoapIndex(Varien_Event_Observer $observer)
    {
        if (!Mage::getSingleton('n98_apilogger/config')->isSoapLogActive()) {
            return;
        }

        if (!$this->_shouldLogWsdlRequest($observer)) {
            return;
        }

        $request = $observer->getControllerAction()->getRequest();
        /* @var $request Mage_Core_Controller_Request_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $request->getRawBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_IN,
                'api_adapter'      => 'soap',
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
        if (!Mage::getSingleton('n98_apilogger/config')->isSoapV2LogActive()) {
            return;
        }

        if (!$this->_shouldLogWsdlRequest($observer)) {
            return;
        }

        $request = $observer->getControllerAction()->getRequest();
        /* @var $request Mage_Core_Controller_Request_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $request->getRawBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_IN,
                'api_adapter'      => 'soap_v2',
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
        if (!Mage::getSingleton('n98_apilogger/config')->isSoapLogActive()) {
            return;
        }

        if (!$this->_shouldLogWsdlRequest($observer)) {
            return;
        }

        $response  = $observer->getControllerAction()->getResponse();
        /* @var $response Mage_Core_Controller_Response_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $response->getBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_OUT,
                'api_adapter'      => 'soap',
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
        if (!Mage::getSingleton('n98_apilogger/config')->isSoapV2LogActive()) {
            return;
        }

        if (!$this->_shouldLogWsdlRequest($observer)) {
            return;
        }

        $response  = $observer->getControllerAction()->getResponse();
        /* @var $response Mage_Core_Controller_Response_Http */
        Mage::helper('n98_apilogger')->log(
            array(
                'body'             => $response->getBody(),
                'direction'        => N98_ApiLogger_Model_Log::DIRECTION_OUT,
                'api_adapter'      => 'soap_v2',
                'http_status_code' => $response->getHttpResponseCode(),
                'http_method'      => '',
            )
        );
    }

    /**
     * @param Varien_Event_Observer $observer
     * @return bool
     */
    protected function _shouldLogWsdlRequest($observer)
    {
        if ($observer->getControllerAction()->getRequest()->getParam('wsdl') === null) {
            return true;
        }

        if (!Mage::getSingleton('n98_apilogger/config')->isLogWsdlRequestActive()) {
            return false;
        }

        return true;
    }
}