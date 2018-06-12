<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Unit\Plugin;

class RemapSortingFieldsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\Plugin\RemapSortingFields
     */
    protected $remapper;

    public function setUp()
    {
        $this->remapper = new \Creativestyle\ContentConstructorAdminExtension\Plugin\RemapSortingFields();
    }

    public function testItRemapsSortingFields()
    {
        $componentsJson = file_get_contents(__DIR__ . '/../assets/components.json');

        $subjectDummy = $this->getMockForAbstractClass(
            \Creativestyle\ContentConstructorAdminExtension\Block\Adminhtml\ContentConstructor\AbstractConstructor::class,
            []
            ,
            '',
            false
        );

        $result = $this->remapper->afterGetExistingComponentsConfiguration($subjectDummy, $componentsJson);

        $result = json_decode($result, true);

        $this->assertEquals('created_at', $result[1]['data']['order_by']);
        $this->assertEquals('bestseller_score_by_amount', $result[5]['data']['order_by']);
        $this->assertEquals('', $result[7]['data']['order_by']);
        $this->assertEquals('new_products', $result[7]['data']['filter']);
        $this->assertEquals('created_at', $result[9]['data']['order_by']);
    }
}