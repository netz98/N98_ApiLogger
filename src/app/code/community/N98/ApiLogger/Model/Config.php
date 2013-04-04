<?php

class N98_ApiLogger_Model_Config extends Mage_Core_Model_Abstract
{
    /**
     * @var string
     */
    const XML_PATH_SOAP_ACTIVE = 'api/n98_apilogger/soap_active';

    /**
     * @var string
     */
    const XML_PATH_SOAP_V2_ACTIVE = 'api/n98_apilogger/soap_v2_active';

    /**
     * @var string
     */
    const XML_PATH_SOAP_WSDL_ACTIVE = 'api/n98_apilogger/wsdl_request_log_active';

    /**
     * @return bool
     */
    public function isSoapLogActive()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_SOAP_ACTIVE);
    }

    /**
     * @return bool
     */
    public function isSoapV2LogActive()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_SOAP_V2_ACTIVE);
    }

    /**
     * @return bool
     */
    public function isLogWsdlRequestActive()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_SOAP_WSDL_ACTIVE);
    }
}