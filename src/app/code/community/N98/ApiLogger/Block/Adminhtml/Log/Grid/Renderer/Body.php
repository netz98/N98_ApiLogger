<?php

class N98_ApiLogger_Block_Adminhtml_Log_Grid_Renderer_Body
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());

        if (substr($value, 0, 5) === '<?xml') {
            $value = $this->_formatXml($value);
        } elseif (substr($value, 0, 1) === '{') {
            // guess json
            $value = $this->_formatJson($value);
        }

        return $value;
    }

    /**
     * @return string
     */
    protected function _formatXml($xml)
    {
        return '<pre class="prettyprint"><code class="lang-xml">'
            . $this->escapeHtml(Mage::helper('core/string')->truncate($xml, 2000))
            . '</code></pre>';
    }

    /**
     * @return string
     */
    protected function _formatJson($json)
    {
        return '<pre class="prettyprint"><code class="lang-json">'
            . $this->escapeHtml(Mage::helper('core/string')->truncate($json, 2000))
            . '</code></pre>';
    }
}