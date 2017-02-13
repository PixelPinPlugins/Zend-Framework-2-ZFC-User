<?php

namespace ZfcUserPixelpinTest\Service;

use ZfcUserPixelpin\Service\User as Service;
use Zend\Crypt\Password\Bcrypt;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $service;

    protected $options;

    protected $serviceManager;

    protected $formHydrator;

    protected $eventManager;

    protected $mapper;

    protected $authService;

    public function setUp()
    {
        $service = new Service;
        $this->service = $service;

        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $this->options = $options;

        $serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager');
        $this->serviceManager = $serviceManager;

        $eventManager = $this->getMock('Zend\EventManager\EventManager');
        $this->eventManager = $eventManager;

        $formHydrator = $this->getMock('Zend\Stdlib\Hydrator\HydratorInterface');
        $this->formHydrator = $formHydrator;

        $mapper = $this->getMock('ZfcUserPixelpin\Mapper\UserInterface');
        $this->mapper = $mapper;

        $authService = $this->getMockBuilder('Zend\Authentication\AuthenticationService')->disableOriginalConstructor()->getMock();
        $this->authService = $authService;

        $service->setOptions($options);
        $service->setServiceManager($serviceManager);
        $service->setFormHydrator($formHydrator);
        $service->setEventManager($eventManager);
        $service->setUserMapper($mapper);
        $service->setAuthService($authService);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::register
     */
    public function testRegisterWithInvalidForm()
    {
        $expectArray = array('username' => 'ZfcUserPixelpin');

        $this->options->expects($this->once())
                      ->method('getUserEntityClass')
                      ->will($this->returnValue('ZfcUserPixelpin\Entity\User'));

        $registerForm = $this->getMockBuilder('ZfcUserPixelpin\Form\Register')->disableOriginalConstructor()->getMock();
        $registerForm->expects($this->once())
                     ->method('setHydrator');
        $registerForm->expects($this->once())
                     ->method('bind');
        $registerForm->expects($this->once())
                     ->method('setData')
                     ->with($expectArray);
        $registerForm->expects($this->once())
                     ->method('isValid')
                     ->will($this->returnValue(false));

        $this->service->setRegisterForm($registerForm);

        $result = $this->service->register($expectArray);

        $this->assertFalse($result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::register
     */
    public function testRegisterWithUsernameAndDisplayNameUserStateDisabled()
    {
        $expectArray = array('username' => 'ZfcUserPixelpin', 'display_name' => 'Zfc User');

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->once())
             ->method('setPassword');
        $user->expects($this->once())
             ->method('getPassword');
        $user->expects($this->once())
             ->method('setUsername')
             ->with('ZfcUserPixelpin');
        $user->expects($this->once())
             ->method('setDisplayName')
             ->with('Zfc User');
        $user->expects($this->once())
             ->method('setState')
             ->with(1);

        $this->options->expects($this->once())
                      ->method('getUserEntityClass')
                      ->will($this->returnValue('ZfcUserPixelpin\Entity\User'));
        $this->options->expects($this->once())
                      ->method('getPasswordCost')
                      ->will($this->returnValue(4));
        $this->options->expects($this->once())
                      ->method('getEnableUsername')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getEnableDisplayName')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getEnableUserState')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getDefaultUserState')
                      ->will($this->returnValue(1));

        $registerForm = $this->getMockBuilder('ZfcUserPixelpin\Form\Register')->disableOriginalConstructor()->getMock();
        $registerForm->expects($this->once())
                     ->method('setHydrator');
        $registerForm->expects($this->once())
                     ->method('bind');
        $registerForm->expects($this->once())
                     ->method('setData')
                     ->with($expectArray);
        $registerForm->expects($this->once())
                     ->method('getData')
                     ->will($this->returnValue($user));
        $registerForm->expects($this->once())
                     ->method('isValid')
                     ->will($this->returnValue(true));

        $this->eventManager->expects($this->exactly(2))
                           ->method('trigger');

        $this->mapper->expects($this->once())
                     ->method('insert')
                     ->with($user)
                     ->will($this->returnValue($user));

        $this->service->setRegisterForm($registerForm);

        $result = $this->service->register($expectArray);

        $this->assertSame($user, $result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::register
     */
    public function testRegisterWithDefaultUserStateOfZero()
    {
        $expectArray = array('username' => 'ZfcUserPixelpin', 'display_name' => 'Zfc User');

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->once())
             ->method('setPassword');
        $user->expects($this->once())
             ->method('getPassword');
        $user->expects($this->once())
             ->method('setUsername')
             ->with('ZfcUserPixelpin');
        $user->expects($this->once())
             ->method('setDisplayName')
             ->with('Zfc User');
        $user->expects($this->once())
             ->method('setState')
             ->with(0);

        $this->options->expects($this->once())
                      ->method('getUserEntityClass')
                      ->will($this->returnValue('ZfcUserPixelpin\Entity\User'));
        $this->options->expects($this->once())
                      ->method('getPasswordCost')
                      ->will($this->returnValue(4));
        $this->options->expects($this->once())
                      ->method('getEnableUsername')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getEnableDisplayName')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getEnableUserState')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getDefaultUserState')
                      ->will($this->returnValue(0));

        $registerForm = $this->getMockBuilder('ZfcUserPixelpin\Form\Register')->disableOriginalConstructor()->getMock();
        $registerForm->expects($this->once())
                     ->method('setHydrator');
        $registerForm->expects($this->once())
                     ->method('bind');
        $registerForm->expects($this->once())
                     ->method('setData')
                     ->with($expectArray);
        $registerForm->expects($this->once())
                     ->method('getData')
                     ->will($this->returnValue($user));
        $registerForm->expects($this->once())
                     ->method('isValid')
                     ->will($this->returnValue(true));

        $this->eventManager->expects($this->exactly(2))
                           ->method('trigger');

        $this->mapper->expects($this->once())
                     ->method('insert')
                     ->with($user)
                     ->will($this->returnValue($user));

        $this->service->setRegisterForm($registerForm);

        $result = $this->service->register($expectArray);

        $this->assertSame($user, $result);
        $this->assertEquals(0, $user->getState());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::register
     */
    public function testRegisterWithUserStateDisabled()
    {
        $expectArray = array('username' => 'ZfcUserPixelpin', 'display_name' => 'Zfc User');

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->once())
             ->method('setPassword');
        $user->expects($this->once())
             ->method('getPassword');
        $user->expects($this->once())
             ->method('setUsername')
             ->with('ZfcUserPixelpin');
        $user->expects($this->once())
             ->method('setDisplayName')
             ->with('Zfc User');
        $user->expects($this->never())
             ->method('setState');

        $this->options->expects($this->once())
                      ->method('getUserEntityClass')
                      ->will($this->returnValue('ZfcUserPixelpin\Entity\User'));
        $this->options->expects($this->once())
                      ->method('getPasswordCost')
                      ->will($this->returnValue(4));
        $this->options->expects($this->once())
                      ->method('getEnableUsername')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getEnableDisplayName')
                      ->will($this->returnValue(true));
        $this->options->expects($this->once())
                      ->method('getEnableUserState')
                      ->will($this->returnValue(false));
        $this->options->expects($this->never())
                      ->method('getDefaultUserState');

        $registerForm = $this->getMockBuilder('ZfcUserPixelpin\Form\Register')->disableOriginalConstructor()->getMock();
        $registerForm->expects($this->once())
                     ->method('setHydrator');
        $registerForm->expects($this->once())
                     ->method('bind');
        $registerForm->expects($this->once())
                     ->method('setData')
                     ->with($expectArray);
        $registerForm->expects($this->once())
                     ->method('getData')
                     ->will($this->returnValue($user));
        $registerForm->expects($this->once())
                     ->method('isValid')
                     ->will($this->returnValue(true));

        $this->eventManager->expects($this->exactly(2))
                           ->method('trigger');

        $this->mapper->expects($this->once())
                     ->method('insert')
                     ->with($user)
                     ->will($this->returnValue($user));

        $this->service->setRegisterForm($registerForm);

        $result = $this->service->register($expectArray);

        $this->assertSame($user, $result);
        $this->assertEquals(0, $user->getState());
    }
    
    /**
     * @covers ZfcUserPixelpin\Service\User::changePassword
     */
    public function testChangePasswordWithWrongOldPassword()
    {
        $data = array('newCredential' => 'zfcUser', 'credential' => 'zfcUserOld');

        $this->options->expects($this->any())
             ->method('getPasswordCost')
             ->will($this->returnValue(4));

        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->options->getPasswordCost());

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->any())
             ->method('getPassword')
             ->will($this->returnValue($bcrypt->create('wrongPassword')));

        $this->authService->expects($this->any())
                          ->method('getIdentity')
                          ->will($this->returnValue($user));

        $result = $this->service->changePassword($data);
        $this->assertFalse($result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::changePassword
     */
    public function testChangePassword()
    {
        $data = array('newCredential' => 'zfcUser', 'credential' => 'zfcUserOld');

        $this->options->expects($this->any())
             ->method('getPasswordCost')
             ->will($this->returnValue(4));

        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->options->getPasswordCost());

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->any())
             ->method('getPassword')
             ->will($this->returnValue($bcrypt->create($data['credential'])));
        $user->expects($this->any())
             ->method('setPassword');

        $this->authService->expects($this->any())
             ->method('getIdentity')
             ->will($this->returnValue($user));

        $this->eventManager->expects($this->exactly(2))
             ->method('trigger');

        $this->mapper->expects($this->once())
             ->method('update')
             ->with($user);

        $result = $this->service->changePassword($data);
        $this->assertTrue($result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::changeEmail
     */
    public function testChangeEmail()
    {
        $data = array('credential' => 'zfcUser', 'newIdentity' => 'zfcUser@zfcUser.com');

        $this->options->expects($this->any())
             ->method('getPasswordCost')
             ->will($this->returnValue(4));

        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->options->getPasswordCost());

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->any())
             ->method('getPassword')
             ->will($this->returnValue($bcrypt->create($data['credential'])));
        $user->expects($this->any())
             ->method('setEmail')
             ->with('zfcUser@zfcUser.com');

        $this->authService->expects($this->any())
             ->method('getIdentity')
             ->will($this->returnValue($user));

        $this->eventManager->expects($this->exactly(2))
             ->method('trigger');

        $this->mapper->expects($this->once())
             ->method('update')
             ->with($user);

        $result = $this->service->changeEmail($data);
        $this->assertTrue($result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::changeEmail
     */
    public function testChangeEmailWithWrongPassword()
    {
        $data = array('credential' => 'zfcUserOld');

        $this->options->expects($this->any())
             ->method('getPasswordCost')
             ->will($this->returnValue(4));

        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->options->getPasswordCost());

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $user->expects($this->any())
             ->method('getPassword')
             ->will($this->returnValue($bcrypt->create('wrongPassword')));

        $this->authService->expects($this->any())
             ->method('getIdentity')
             ->will($this->returnValue($user));

        $result = $this->service->changeEmail($data);
        $this->assertFalse($result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getUserMapper
     */
    public function testGetUserMapper()
    {
        $this->serviceManager->expects($this->once())
                             ->method('get')
                             ->with('zfcuser_user_mapper')
                             ->will($this->returnValue($this->mapper));

        $service = new Service;
        $service->setServiceManager($this->serviceManager);
        $this->assertInstanceOf('ZfcUserPixelpin\Mapper\UserInterface', $service->getUserMapper());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getUserMapper
     * @covers ZfcUserPixelpin\Service\User::setUserMapper
     */
    public function testSetGetUserMapper()
    {
        $this->assertSame($this->mapper, $this->service->getUserMapper());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getAuthService
     */
    public function testGetAuthService()
    {
        $this->serviceManager->expects($this->once())
             ->method('get')
             ->with('zfcuser_auth_service')
             ->will($this->returnValue($this->authService));

        $service = new Service;
        $service->setServiceManager($this->serviceManager);
        $this->assertInstanceOf('Zend\Authentication\AuthenticationService', $service->getAuthService());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getAuthService
     * @covers ZfcUserPixelpin\Service\User::setAuthService
     */
    public function testSetGetAuthService()
    {
        $this->assertSame($this->authService, $this->service->getAuthService());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getRegisterForm
     */
    public function testGetRegisterForm()
    {
        $form = $this->getMockBuilder('ZfcUserPixelpin\Form\Register')->disableOriginalConstructor()->getMock();

        $this->serviceManager->expects($this->once())
             ->method('get')
             ->with('zfcuser_register_form')
             ->will($this->returnValue($form));

        $service = new Service;
        $service->setServiceManager($this->serviceManager);

        $result = $service->getRegisterForm();

        $this->assertInstanceOf('ZfcUserPixelpin\Form\Register', $result);
        $this->assertSame($form, $result);
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getRegisterForm
     * @covers ZfcUserPixelpin\Service\User::setRegisterForm
     */
    public function testSetGetRegisterForm()
    {
        $form = $this->getMockBuilder('ZfcUserPixelpin\Form\Register')->disableOriginalConstructor()->getMock();
        $this->service->setRegisterForm($form);

        $this->assertSame($form, $this->service->getRegisterForm());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getChangePasswordForm
     */
    public function testGetChangePasswordForm()
    {
        $form = $this->getMockBuilder('ZfcUserPixelpin\Form\ChangePassword')->disableOriginalConstructor()->getMock();

        $this->serviceManager->expects($this->once())
             ->method('get')
             ->with('zfcuser_change_password_form')
             ->will($this->returnValue($form));

        $service = new Service;
        $service->setServiceManager($this->serviceManager);
        $this->assertInstanceOf('ZfcUserPixelpin\Form\ChangePassword', $service->getChangePasswordForm());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getChangePasswordForm
     * @covers ZfcUserPixelpin\Service\User::setChangePasswordForm
     */
    public function testSetGetChangePasswordForm()
    {
        $form = $this->getMockBuilder('ZfcUserPixelpin\Form\ChangePassword')->disableOriginalConstructor()->getMock();
        $this->service->setChangePasswordForm($form);

        $this->assertSame($form, $this->service->getChangePasswordForm());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getOptions
     */
    public function testGetOptions()
    {
        $this->serviceManager->expects($this->once())
             ->method('get')
             ->with('zfcuser_module_options')
             ->will($this->returnValue($this->options));

        $service = new Service;
        $service->setServiceManager($this->serviceManager);
        $this->assertInstanceOf('ZfcUserPixelpin\Options\ModuleOptions', $service->getOptions());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::setOptions
     */
    public function testSetOptions()
    {
        $this->assertSame($this->options, $this->service->getOptions());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getServiceManager
     * @covers ZfcUserPixelpin\Service\User::setServiceManager
     */
    public function testSetGetServiceManager()
    {
        $this->assertSame($this->serviceManager, $this->service->getServiceManager());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::getFormHydrator
     */
    public function testGetFormHydrator()
    {
        $this->serviceManager->expects($this->once())
             ->method('get')
             ->with('zfcuser_register_form_hydrator')
             ->will($this->returnValue($this->formHydrator));

        $service = new Service;
        $service->setServiceManager($this->serviceManager);
        $this->assertInstanceOf('Zend\Stdlib\Hydrator\HydratorInterface', $service->getFormHydrator());
    }

    /**
     * @covers ZfcUserPixelpin\Service\User::setFormHydrator
     */
    public function testSetFormHydrator()
    {
        $this->assertSame($this->formHydrator, $this->service->getFormHydrator());
    }
}
