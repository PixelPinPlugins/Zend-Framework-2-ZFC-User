<?php
namespace ZfcUserPixelpinTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\Hydrator\ClassMethods;
use ZfcUserPixelpin\Factory\Form\Register as RegisterFactory;
use ZfcUserPixelpin\Options\ModuleOptions;
use ZfcUserPixelpin\Mapper\User as UserMapper;

class RegisterFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zfcuser_module_options', new ModuleOptions);
        $serviceManager->setService('zfcuser_user_mapper', new UserMapper);
        $serviceManager->setService('zfcuser_register_form_hydrator', new ClassMethods());

        $formElementManager = new FormElementManager();
        $formElementManager->setServiceLocator($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new RegisterFactory();

        $this->assertInstanceOf('ZfcUserPixelpin\Form\Register', $factory->createService($formElementManager));
    }
}
