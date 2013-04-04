<?php

class N98_ApiLogger_Adminhtml_ApiloggerController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('system/services/n98_apilogger');
        $this->_addBreadcrumb($this->__('Web services'), $this->__('Web services'));
        $this->_addBreadcrumb($this->__('Api Log'), $this->__('Api Log'));

        return $this;
    }

    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/api/n98_apilogger');
    }
}