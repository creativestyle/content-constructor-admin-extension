<?php

namespace Creativestyle\ContentConstructorAdminExtension\Template;

class Locator implements \Creativestyle\ContentConstructor\View\AdminTemplateLocator
{
    /**
     * @var \Creativestyle\ContentConstructorFrontend\TemplateLocator
     */
    private $templateLocator;

    public function __construct(\Creativestyle\ContentConstructorFrontend\TemplateLocator $templateLocator)
    {
        $this->templateLocator = $templateLocator;
    }


    public function locate($path)
    {
        return $this->templateLocator->locate($path);
    }
}
