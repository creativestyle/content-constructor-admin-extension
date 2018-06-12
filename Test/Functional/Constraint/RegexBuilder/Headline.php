<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Constraint\RegexBuilder;

class Headline implements \Creativestyle\ContentConstructorAdminExtension\Test\Constraint\AssertionRegexBuilder
{
    /**
     * @param $component \Creativestyle\ContentConstructorAdminExtension\Test\Fixture\Headline
     * @return string
     */
    public function buildRegex($component)
    {
        $subtitle = $component->getSubtitle() == null ? '' : $component->getSubtitle();

        return $component->getTitle() . '(.*?)' . $subtitle;
    }
}