<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Constraint;

class AssertionRegexBuilderFactory
{
    /**
     * @param $componentType
     * @return AssertionRegexBuilder
     */
    public function create($componentType)
    {
        $className = 'Creativestyle\ContentConstructorAdminExtension\Test\Constraint\RegexBuilder\\'.ucfirst($componentType);

        return new $className;
    }
}