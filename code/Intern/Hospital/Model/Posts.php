<?php
namespace Intern\Hospital\Model;
class Posts extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'intern_hospital_post';

    protected $_cacheTag = 'intern_hospital_post';

    protected $_eventPrefix = 'intern_hospital_post';

    protected function _construct()
    {
        $this->_init('Intern\Hospital\Model\ResourceModel\Posts');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
