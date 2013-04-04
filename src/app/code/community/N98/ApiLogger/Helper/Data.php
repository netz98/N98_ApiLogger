<?php

class N98_ApiLogger_Helper_Data extends Mage_Core_Helper_Data
{
    /**
     * @return string
     */
    public function getRequestId()
    {
        $requestId = Mage::registry('n98_apilogger_request_id');
        if ($requestId === null) {
            $requestId = uniqid('request');
            Mage::register('n98_apilogger_request_id', $requestId);
        }

        return $requestId;
    }

    /**
     * @param string $data
     */
    public function log($data)
    {
        $data['request_id'] = $this->getRequestId();
        $model = Mage::getModel('n98_apilogger/log');
        $model->addData($data);
        $model->save();
    }

}