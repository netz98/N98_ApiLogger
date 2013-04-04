<?php

require_once ('abstract.php');

class N98_Api_log extends Mage_Shell_Abstract
{
    /**
     *
     * @see Mage_Shell_Abstract::run()
     */
    public function run()
    {
        if ($this->getArg('list')) {
            $collection = Mage::getModel('n98_apilogger/log')->getCollection();
            $table = new Zend_Text_Table(array('columnWidths' => array(10, 20, 22, 60)));
            foreach ($collection->getLastRequests() as $request) {
                $table->appendRow(array($request->getId(), $request->getCreatedAt(), $request->getRequestId(), $request->getBody()));
            }
            echo $table->render();
        } elseif ($this->getArg('info')) {
        } else {
            echo $this->usageHelp();
        }
    }

    /**
     * Retrieve Usage Help Message
     *
     */
    public function usageHelp()
    {
        return <<<USAGE
Usage:  php n98_api_log -- [options]
  --list                Lists last api calls

  help				This help

USAGE;
    }

}

$shell = new N98_Api_log();
$shell->run();