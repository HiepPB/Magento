<?php
namespace Intern\Hospital\Model\ResourceModel;


class Posts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('intern_hospital_post', 'post_id');
    }

}
