<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 24/02/15
 * Time: 11:04 AM
 */

namespace FyZf2ModuleTest\Service;

use PHPUnit_Framework_TestCase as TestCase;
use FyZf2Module\Service\TestService;

use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Service\ServiceManagerConfig;


class TestServiceTest extends TestCase
{
     protected $serviceManager;

     public function setUp()
     {
         $moduleConfig = include __DIR__ . '/../../../config/module.config.php';
         $serviceManagerConfig = $moduleConfig['service_manager'];

         $this->serviceManager = new ServiceManager(new ServiceManagerConfig($serviceManagerConfig ));
     }

     public function testTestService()
     {
         $testService = $this->serviceManager->get('test-service');
         $this->assertEquals('foo', $testService->foo());
         $this->assertTrue(class_exists('FyZf2Module\Service\TestService'));

         $this->assertInstanceOf('Zend\ServiceManager\ServiceLocatorInterface', $testService->getServiceLocator());
     }
}
