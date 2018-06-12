<?php

namespace Creativestyle\ContentConstructorAdminExtension\Block\Adminhtml;

class CategoryPicker extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\Service\UiComponentRenderer
     */
    private $uiComponentRenderer;

    /**
     * Constructor constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Creativestyle\ContentConstructorAdminExtension\Repository\Xml\XmlToComponentConfigurationMapper $xmlToComponentConfiguration
     * @param \Magento\Framework\App\DeploymentConfig\Reader $configReader
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Creativestyle\ContentConstructorAdminExtension\Service\UiComponentRenderer $uiComponentRenderer,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->uiComponentRenderer = $uiComponentRenderer;

        $this->setTemplate('category_picker.phtml');
    }

    public function getCategoryPicker() {
        return $this->uiComponentRenderer->renderUiComponent('categories_picker');
    }

}