<?php

class N98_ApiLogger_Model_Resource_Log extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('n98_apilogger/log', 'log_id');
    }
}