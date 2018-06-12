<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Unit\Service;

class AdminComponentFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructor\Factory\ComponentFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    private $factory;

    public function setUp() {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->factory = $this->objectManager->get(\Creativestyle\ContentConstructorAdminExtension\Service\AdminComponentFactory::class);
    }

    public function testItImplementsComponentFactoryInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Factory\AdminComponentFactory::class, $this->factory);
    }

    public function testItReturnsNullWhenComponentDoesNotExists() {
        $createdComponent = $this->factory->create('not_existing_component');

        $this->assertNull($createdComponent);
    }
    /**
     * @dataProvider getComponents
     */
    public function testItReturnsComponentsProperly($componentName, $expectedClass) {
        $createdComponent = $this->factory->create($componentName);

        $this->assertInstanceOf($expectedClass, $createdComponent);
    }

    public function getComponents() {
        return [
            ['headline', \Creativestyle\ContentConstructor\Components\Headline\HeadlineAdmin::class],
            ['static-cms-block', \Creativestyle\ContentConstructor\Components\StaticBlock\StaticBlockAdmin::class],
            ['picker', \Creativestyle\ContentConstructor\Components\Picker\PickerAdmin::class],
            ['image-teaser', \Creativestyle\ContentConstructor\Components\ImageTeaser\ImageTeaserAdmin::class],
            ['product-carousel', \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin::class],
            ['paragraph', \Creativestyle\ContentConstructor\Components\Paragraph\ParagraphAdmin::class],
            ['hero-carousel', \Creativestyle\ContentConstructor\Components\HeroCarousel\HeroCarouselAdmin::class],
            ['button', \Creativestyle\ContentConstructor\Components\Button\ButtonAdmin::class],
            ['category-links', \Creativestyle\ContentConstructor\Components\CategoryLinks\CategoryLinksAdmin::class],
            ['product-grid', \Creativestyle\ContentConstructor\Components\ProductGrid\ProductGridAdmin::class],
            ['custom-html', \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtmlAdmin::class],
            ['cms-teaser', \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdmin::class]
        ];
    }
}