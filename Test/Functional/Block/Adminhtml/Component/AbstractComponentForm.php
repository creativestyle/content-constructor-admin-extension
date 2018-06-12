<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Block\Adminhtml\Component;

class AbstractComponentForm extends \Magento\Mtf\Block\Block
{
    private $saveButtonSelector = '.page-actions-buttons .action-primary';

    public function clickSave() {
        $this->_rootElement->find($this->saveButtonSelector)->click();
    }
}