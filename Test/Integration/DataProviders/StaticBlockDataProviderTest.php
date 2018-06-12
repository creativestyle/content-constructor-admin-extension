<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Integration\DataProviders;

class StaticBlockDataProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\DataProviders\StaticBlockDataProvider
     */
    private $dataProvider;

    public function setUp() {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();
        $this->dataProvider = $this->objectManager
                ->get(\Creativestyle\ContentConstructorAdminExtension\DataProviders\StaticBlockDataProvider::class);
    }

    public function testItImplementsCorrectInterface() {
        $this->assertInstanceOf(
            \Creativestyle\ContentConstructor\Components\StaticBlock\DataProvider::class,
            $this->dataProvider
        );
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/Cms/_files/block.php
     * @magentoDataFixture loadSecondBlockFixture
     */
    public function testItReturnsCorrectData() {
        $this->assertEquals(
            [
                ['identifier' => 'fixture_block', 'title' => 'CMS Block Title'],
                ['identifier' => 'another_fixture_block', 'title' => 'Another block title']
            ],
            $this->dataProvider->getBlocks()
        );
    }

    public static function loadSecondBlockFixture() {
        require __DIR__.'/_files/block.php';
    }

}