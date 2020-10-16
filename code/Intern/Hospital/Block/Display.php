<?php
namespace Intern\Hospital\Block;
use Intern\Hospital\Helper\Data;
class Display extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $helperData;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Intern\Hospital\Model\PostsFactory $postFactory,
         Data $helperData
    )
    {
        $this->_postFactory = $postFactory;
        $this->helperData = $helperData;
        parent::__construct($context);
    }

    public function dataHospital()
    {
        return __('List Hospital');
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
    public function getEnable()
    {
        return $this->helperData->getGeneralConfig('enable');

    }
}
