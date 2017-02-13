<?php
namespace ZfcUserPixelpinTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use ZfcUserPixelpin\Factory\Form\Login as LoginFactory;
use ZfcUserPixelpin\Options\ModuleOptions;

class LoginFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zfcuser_module_options', new ModuleOptions);

        $formElementManager = new FormElementManager();
        $formElementManager->setServiceLocator($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new LoginFactory();

        $this->assertInstanceOf('ZfcUserPixelpin\Form\Login', $factory->createService($formElementManager));
    }
}
