<?php

class N98_ApiLogger_Model_Resource_Log_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('n98_apilogger/log', 'log_id');
    }

    /**
     * @param int $limit
     * @return N98_ApiLogger_Model_Resource_Log_Collection
     */
    public function getLastRequests($limit = 20)
    {
        $this
            ->addOrder('log_id', self::SORT_ORDER_DESC)
            ->setPageSize($limit);

        return $this;
    }
}