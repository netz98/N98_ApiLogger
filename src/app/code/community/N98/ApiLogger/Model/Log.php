<?php

class N98_ApiLogger_Model_Log extends Mage_Core_Model_Abstract
{
    /**
     * @var string
     */
    const DIRECTION_IN = 'in';

    /**
     * @var string
     */
    const DIRECTION_OUT = 'out';

    public function _construct()
    {
        $this->_init('n98_apilogger/log');
    }
}