<?php
namespace ZfcUserPixelpinTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use ZfcUserPixelpin\Factory\Form\ChangePassword as ChangePasswordFactory;
use ZfcUserPixelpin\Options\ModuleOptions;
use ZfcUserPixelpin\Mapper\User as UserMapper;

class ChangePasswordFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zfcuser_module_options', new ModuleOptions);
        $serviceManager->setService('zfcuser_user_mapper', new UserMapper);

        $formElementManager = new FormElementManager();
        $formElementManager->setServiceLocator($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new ChangePasswordFactory();

        $this->assertInstanceOf('ZfcUserPixelpin\Form\ChangePassword', $factory->createService($formElementManager));
    }
}
