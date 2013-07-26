<?php

namespace QtzExpediaTest;

use PHPUnit_Framework_TestCase;

use QtzExpedia\Module;

/**
 * Description of ModuleTest
 *
 * @author Alex Savchenko
 */
class ModuleTest extends PHPUnit_Framework_TestCase
{
    protected $module;

    public function setUp()
    {
        $this->module = new Module;
    }

    public function testGetAutoloaderConfig()
    {
        if (method_exists($this->module, 'getAutoloaderConfig')) {
            $config = $this->module->getAutoloaderConfig();
            $this->assertNotEmpty($config);
        }
    }

    /**
     * Test the module config, if provided
     */
    public function testGetConfig()
    {
        if (method_exists($this->module, 'getConfig')) {
            $config = $this->module->getConfig();
            $this->assertNotEmpty($config);
        }
    }

    /**
     * Test the service config, if provided
     */
    public function testGetServiceConfig()
    {
        if (method_exists($this->module, 'getServiceConfig')) {
            $config = $this->module->getServiceConfig();
            $this->assertNotEmpty($config);
        }
    }
}
