<?php

namespace Creativestyle\ContentConstructorAdminExtension\Test\Unit\DataProviders;

class ContentConstructorConfigDataProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $customizationPathStub;

    /**
     * @var \Creativestyle\ContentConstructorAdminExtension\DataProviders\ContentConstructorConfigDataProvider
     */
    protected $configDataProvider;

    public function setUp()
    {
        $scopeConfigDummy = $this->getMockBuilder(\Magento\Framework\App\Config\ScopeConfigInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $themeProviderStub = $this->getMockBuilder(\Magento\Framework\View\Design\Theme\ThemeProviderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();


        $parentThemeStub = $this->getMockBuilder(\Magento\Framework\View\Design\ThemeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $themeStub = $this->getMockBuilder(\Magento\Framework\View\Design\ThemeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $themeStub->method('getParentTheme')->willReturn($parentThemeStub);

        $themeProviderStub->method('getThemeById')->willReturn($themeStub);

        $this->customizationPathStub = $this->getMockBuilder(\Magento\Framework\View\Design\Theme\Customization\Path::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->configDataProvider = new \Creativestyle\ContentConstructorAdminExtension\DataProviders\ContentConstructorConfigDataProvider(
            $scopeConfigDummy,
            $themeProviderStub,
            $this->customizationPathStub
        );
    }

    public function testItReturnsEmptyJsonObjectWhenThereAreNoConfigsDefined()
    {
        $this->assertEquals('{}', $this->configDataProvider->getConfig());
    }

    public function testItReturnsEmptyJsonObjectWhenThereIsNoProjectConfig()
    {
        $this->customizationPathStub->method('getThemeFilesPath')->willReturnOnConsecutiveCalls(
            __DIR__ . '/../assets/theme-nonexisting',
            __DIR__ . '/../assets/theme-creativeshop'
        );

        $this->assertEquals('{}', $this->configDataProvider->getProjectConfig());
    }

    public function testItReturnsConfigFromParentTheme()
    {
        $this->customizationPathStub->method('getThemeFilesPath')->willReturnOnConsecutiveCalls(
            __DIR__ . '/../assets/theme-without-config',
            __DIR__ . '/../assets/parent-theme'
        );

        $this->assertEquals('{"test-data":"test-data-parent-theme"}', $this->configDataProvider->getConfig());
    }

    public function testItReturnsConfigFromDefaultTheme()
    {
        $this->customizationPathStub->method('getThemeFilesPath')->willReturnOnConsecutiveCalls(
            __DIR__ . '/../assets/theme',
            __DIR__ . '/../assets/parent-theme'
        );

        $this->assertEquals('{"test-data":"test-data"}', $this->configDataProvider->getConfig());
    }
    
    public function testItReturnsConfigFromCreativeshopTheme()
    {
        $this->customizationPathStub->method('getThemeFilesPath')->willReturnOnConsecutiveCalls(
            __DIR__ . '/../assets/theme-project',
            __DIR__ . '/../assets/theme-creativeshop'
        );

        $this->assertEquals('{"test-data":"theme-creativeshop"}', $this->configDataProvider->getCreativeshopConfig());
    }

    public function testItReturnsConfigFromProjectTheme()
    {
        $this->customizationPathStub->method('getThemeFilesPath')->willReturnOnConsecutiveCalls(
            __DIR__ . '/../assets/theme-project',
            __DIR__ . '/../assets/theme-creativeshop'
        );

        $this->assertEquals('{"test-data":"theme-project"}', $this->configDataProvider->getProjectConfig());
    }
}