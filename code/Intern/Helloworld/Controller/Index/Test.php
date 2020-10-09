<?php

namespace Intern\Helloworld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Tigren'));
        $this->_eventManager->dispatch('intern_helloworld_display_text', ['tg_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
