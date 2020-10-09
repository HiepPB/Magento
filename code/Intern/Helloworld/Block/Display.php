<?php
namespace Intern\Helloworld\Block;

use Intern\Helloworld\Model\PostFactory;
use Magento\Framework\View\Element\Template\Context;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    public function __construct(Context $context, PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }
    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}
