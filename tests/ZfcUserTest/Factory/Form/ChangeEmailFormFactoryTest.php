<?php
namespace ZfcUserPixelpinTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use ZfcUserPixelpin\Factory\Form\ChangeEmail as ChangeEmailFactory;
use ZfcUserPixelpin\Options\ModuleOptions;
use ZfcUserPixelpin\Mapper\User as UserMapper;

class ChangeEmailFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zfcuser_module_options', new ModuleOptions);
        $serviceManager->setService('zfcuser_user_mapper', new UserMapper);

        $formElementManager = new FormElementManager();
        $formElementManager->setServiceLocator($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new ChangeEmailFactory();

        $this->assertInstanceOf('ZfcUserPixelpin\Form\ChangeEmail', $factory->createService($formElementManager));
    }
}
