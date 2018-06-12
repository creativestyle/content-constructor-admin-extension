<?php


namespace Creativestyle\ContentConstructorAdminExtension\Test\Constraint\RegexBuilder;


class CmsBlock implements \Creativestyle\ContentConstructorAdminExtension\Test\Constraint\AssertionRegexBuilder
{
    /**
     * @param $component \Magento\Cms\Test\Fixture\CmsBlock
     * @return string
     */
    public function buildRegex($component)
    {
        return $component->getContent();
    }
}