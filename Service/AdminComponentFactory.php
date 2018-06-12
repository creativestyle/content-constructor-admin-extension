<?php

namespace Creativestyle\ContentConstructorAdminExtension\Service;

class AdminComponentFactory implements \Creativestyle\ContentConstructor\Factory\AdminComponentFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    private $classMappings = [
        'headline' => \Creativestyle\ContentConstructor\Components\Headline\HeadlineAdmin::class,
        'static-cms-block' => \Creativestyle\ContentConstructor\Components\StaticBlock\StaticBlockAdmin::class,
        'picker' => \Creativestyle\ContentConstructor\Components\Picker\PickerAdmin::class,
        'image-teaser' => \Creativestyle\ContentConstructor\Components\ImageTeaser\ImageTeaserAdmin::class,
        'product-carousel' => \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin::class,
        'paragraph' => \Creativestyle\ContentConstructor\Components\Paragraph\ParagraphAdmin::class,
        'hero-carousel' => \Creativestyle\ContentConstructor\Components\HeroCarousel\HeroCarouselAdmin::class,
        'button' => \Creativestyle\ContentConstructor\Components\Button\ButtonAdmin::class,
        'category-links' => \Creativestyle\ContentConstructor\Components\CategoryLinks\CategoryLinksAdmin::class,
        'product-grid' => \Creativestyle\ContentConstructor\Components\ProductGrid\ProductGridAdmin::class,
        'magento-product-grid-teasers' => \Creativestyle\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasersAdmin::class,
        'custom-html' => \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtmlAdmin::class,
        'cms-teaser' => \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdmin::class
    ];

    /**
     * @param $componentName
     * @return \Creativestyle\ContentConstructor\AdminComponent
     */
    public function create(string $componentName)
    {
        if(!isset($this->classMappings[$componentName])) {
            return null;
        }

        return $this->objectManager->get($this->classMappings[$componentName]);
    }
}