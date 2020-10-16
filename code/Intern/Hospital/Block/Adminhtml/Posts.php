<?php
namespace Intern\Hospital\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Posts extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_posts';
        $this->_blockGroup = 'Intern_Hospital';
        $this->_headerText = __('Display');
        $this->_addButtonLabel = __('Add New Display');
        parent::_construct();
    }
}
