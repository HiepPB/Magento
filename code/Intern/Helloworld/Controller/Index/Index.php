<?php
namespace Intern\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Intern\Helloworld\Model\PostFactory;

class Index extends Action
{
    protected $_pageFactory;
    protected $_postFactory;

    public function __construct(Context $context, PageFactory $pageFactory, PostFactory $postFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $postModel = $this->_postFactory->create();
        $collection = $postModel->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
