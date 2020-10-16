<?php
namespace Intern\Hospital\Controller\Adminhtml\Posts;

use Intern\Hospital\Controller\Adminhtml\Posts;

class Grid extends Posts
{
    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}
