<?php
namespace Intern\Helloworld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'intern_helloworld_post';

    protected $_cacheTag = 'intern_helloworld_post';

    protected $_eventPrefix = 'intern_helloworld_post';

    protected function _construct()
    {
        $this->_init('Intern\Helloworld\Model\ResourceModel\Post');
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
