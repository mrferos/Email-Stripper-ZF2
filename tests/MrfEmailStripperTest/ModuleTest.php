<?php
namespace MrfEmailStripperTest;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testGetServiceConfigHasFactories()
    {
        $module = new \MrfEmailStripper\Module();
        $serviceConfig = $module->getServiceConfig();
        $this->assertArrayHasKey('factories', $serviceConfig);
    }

    /**
     * @depends testGetServiceConfigHasFactories
     */
    public function testGetServiceConfigHasEmailStripper()
    {
        $module = new \MrfEmailStripper\Module();
        $serviceConfig = $module->getServiceConfig();
        $this->assertArrayHasKey('EmailStripper', $serviceConfig['factories']);
    }
}