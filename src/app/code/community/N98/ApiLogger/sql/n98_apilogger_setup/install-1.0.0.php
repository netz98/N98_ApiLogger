<?php

/** @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();

$table = $this->getConnection()
    ->newTable($this->getTable('n98_apilogger/log'))
    ->addColumn('log_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary'  => true,
        ), 'Log ID')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null,
        array(
            'nullable' => false,
            'default'  => Varien_Db_Ddl_Table::TIMESTAMP_INIT
        ), 'Created At')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null,
        array(
            'nullable'  => true
        ), 'Updated At')
    ->addColumn('body', Varien_Db_Ddl_Table::TYPE_TEXT, null)
    ->addColumn('request_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array('nullable' => false))
    ->addColumn('direction', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array('nullable' => false))
    ->addColumn('api_adapter', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array('nullable' => false))
    ->addColumn('http_method', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array('nullable' => false))
    ->addColumn('http_status_code', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array('nullable' => false))
    ->setComment('log table for API requests');

$this->getConnection()->createTable($table);

$this->endSetup();