<?php

namespace Creativestyle\ContentConstructorAdminExtension\DataProviders;

class WysiwygConfigDataProvider implements \Creativestyle\ContentConstructor\Components\Paragraph\WysiwygConfigDataProvider
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    private $wysiwygConfig;

    public function __construct(\Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig)
    {
        $this->wysiwygConfig = $wysiwygConfig;
    }

    public function getConfig()
    {
        return $this->wysiwygConfig->getConfig();
    }
}