<?php
namespace Intern\Hospital\Model\ResourceModel\Posts;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'intern_hospital_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Intern\Hospital\Model\Posts', 'Intern\Hospital\Model\ResourceModel\Posts');
    }

}
