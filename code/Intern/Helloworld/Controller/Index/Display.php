<?php
namespace Intern\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Intern\Helloworld\Model\PostFactory;

class Display extends Action
{

    protected $_pageFactory;
    protected $_postFactory;
    public function __construct(Context $context, PageFactory $pageFactory, PostFactory $postFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function create(){
        $data = [
            'name'         => "A",
            'post_content' => "Content A",
            'status'       => 1
        ];
        $postModel = $this->_postFactory->create();
        $postModel->addData($data)->save();
    }

    public function update(){
        $postModel = $this->_postFactory->create();
        $item = $postModel->load(2);
        $data_setting = [
            'name' => "S",
            'post_content' => "Content S",
        ];
        foreach ($data_setting as $key => $value){
            $item->setData($key, $value);
        }
//        $content = "Welcom to Tigren";
//        $item->setData('post_content',$content);
        $postModel->save();
    }

    public function delete(){
        $postModel = $this->_postFactory->create();
        $item_1 = $postModel->load(4);
        $item_1->delete();
        $postModel->save();
    }

    public function execute()
    {
//        $this->create();
        $this->update();
//        $this->delete();
        return $this->_pageFactory->create();
    }
}
