<?php

namespace Perspective\Thema14Helloworld\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Perspective\Thema14Helloworld\Model\PostFactory;
use Perspective\Thema14Helloworld\Model\ResourceModel\Post;

class AddData implements DataPatchInterface, PatchVersionInterface
{
    private $postFactory;
    private $postResource;
    private $moduleDataSetup;
    public function __construct(
        PostFactory $postFactory,
        Post $postResource,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->postFactory = $postFactory;
        $this->postResource = $postResource;
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        //Install data row into contact_details table
        $this->moduleDataSetup->startSetup();

        for ($i = 1; $i < 6; $i++) {
            $postDTO = $this->postFactory->create();
            $postDTO->setPostName("Post_$i")->setUrlKey("Post_$i")->setPostContent("Post_$i")->setTags("post")
                ->setStatus(0)->setFeaturedImage("Image_$i")->setCreatedAt("2022-01-10")->setUpdatedAt("2022-01-31");
            $this->postResource->save($postDTO);
        }

        $this->moduleDataSetup->endSetup();
    }
    public static function getDependencies()
    {
        return [];
    }
    public static function getVersion()
    {
        return '1.0.3';
    }
    public function getAliases()

    {
        return [];
    }
}
