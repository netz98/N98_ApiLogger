<?php

class N98_ApiLogger_Block_Adminhtml_Log extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_log';
        $this->_blockGroup = 'n98_apilogger';
        $this->_headerText = Mage::helper('n98_apilogger')->__('API Log');
        parent::__construct();
        $this->removeButton('add');
    }
}