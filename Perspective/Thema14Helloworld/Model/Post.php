<?php

namespace Perspective\Thema14Helloworld\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'perspective_helloworld_post';

    protected $_cacheTag = 'perspective_helloworld_post';

    protected $_eventPrefix = 'perspective_helloworld_post';

    protected function _construct()
    {
        $this->_init('Perspective\Thema14Helloworld\Model\ResourceModel\Post');
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
