<?php

class N98_ApiLogger_Block_Adminhtml_Log_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('apilogger_grid');
        $this->setDefaultSort('log_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('n98_apilogger/log')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('log_id', array(
            'header' => Mage::helper('n98_apilogger')->__('Log ID'),
            'align'  =>'right',
            'width'  => '20px',
            'index'  => 'log_id',
        ));

        $this->addColumn('api_adapter', array(
            'header' => Mage::helper('n98_apilogger')->__('API Adapter'),
            'align'  => 'center',
            'width'  => '20px',
            'index'  => 'api_adapter',
        ));

        $this->addColumn('created_at', array(
            'header' => Mage::helper('n98_apilogger')->__('Created At'),
            'align'  => 'center',
            'width'  => '20px',
            'type'   => 'datetime',
            'index'  => 'created_at',
        ));

        $this->addColumn('request_id', array(
                'header' => Mage::helper('n98_apilogger')->__('Request ID'),
                'align'  => 'center',
                'width'  => '40px',
                'type'   => 'text',
                'index'  => 'request_id',
            ));

        $this->addColumn('body', array(
            'header'   => Mage::helper('n98_apilogger')->__('Body'),
            'align'    => 'left',
            'index'    => 'body',
            'renderer' => 'n98_apilogger/adminhtml_log_grid_renderer_body'
        ));
    }
}