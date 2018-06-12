<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Unit\UiComponents;

class CategoryPickerProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\UiComponents\CategoryPickerProvider
     */
    private $pickerProvider;

    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\Service\UiComponentRenderer|\PHPUnit_Framework_MockObject_MockObject
     */
    private $uiComponentRendererMock;

    public function setUp()
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->uiComponentRendererMock = $this
            ->getMockBuilder(\Creativestyle\ContentConstructorAdminExtension\Service\UiComponentRenderer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->pickerProvider = $this
            ->objectManager
            ->create(
                \Creativestyle\ContentConstructorAdminExtension\UiComponents\CategoryPickerProvider::class,
                ['uiComponentRenderer' => $this->uiComponentRendererMock]
            );
    }

    public function testItImplementsCategoryPickerProviderInterface()
    {
        $this->assertInstanceOf(
            \Creativestyle\ContentConstructor\Components\ProductCarousel\CategoryPickerProvider::class,
            $this->pickerProvider
        );
    }

    public function testItRendersUiComponent()
    {
        $this->uiComponentRendererMock
            ->expects($this->once())
            ->method('renderUiComponent')
            ->with('categories_picker')
            ->willReturn('rendered_ui_component');

        $this->assertContains('rendered_ui_component', $this->pickerProvider->renderPicker());
    }
}