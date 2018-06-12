<?php

namespace Creativestyle\ContentConstructorAdminExtension\UiComponents;

class CategoryPickerProvider implements \Creativestyle\ContentConstructor\Components\ProductCarousel\CategoryPickerProvider
{
    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\Service\UiComponentRenderer
     */
    private $uiComponentRenderer;

    public function __construct(\Creativestyle\ContentConstructorAdminExtension\Service\UiComponentRenderer $uiComponentRenderer)
    {
        $this->uiComponentRenderer = $uiComponentRenderer;
    }

    public function renderPicker()
    {
        return $this->uiComponentRenderer->renderUiComponent('categories_picker');
    }
}