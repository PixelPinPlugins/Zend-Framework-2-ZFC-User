<?php

namespace ZfcUserPixelpinTest\Options;

use ZfcUserPixelpin\Options\ModuleOptions as Options;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Options $options
     */
    protected $options;

    public function setUp()
    {
        $options = new Options;
        $this->options = $options;
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLoginRedirectRoute
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setLoginRedirectRoute
     */
    public function testSetGetLoginRedirectRoute()
    {
        $this->options->setLoginRedirectRoute('zfcUserRoute');
        $this->assertEquals('zfcUserRoute', $this->options->getLoginRedirectRoute());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLoginRedirectRoute
     */
    public function testGetLoginRedirectRoute()
    {
        $this->assertEquals('zfcuser', $this->options->getLoginRedirectRoute());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLogoutRedirectRoute
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setLogoutRedirectRoute
     */
    public function testSetGetLogoutRedirectRoute()
    {
        $this->options->setLogoutRedirectRoute('zfcUserRoute');
        $this->assertEquals('zfcUserRoute', $this->options->getLogoutRedirectRoute());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLogoutRedirectRoute
     */
    public function testGetLogoutRedirectRoute()
    {
        $this->assertSame('zfcuser/login', $this->options->getLogoutRedirectRoute());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUseRedirectParameterIfPresent
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setUseRedirectParameterIfPresent
     */
    public function testSetGetUseRedirectParameterIfPresent()
    {
        $this->options->setUseRedirectParameterIfPresent(false);
        $this->assertFalse($this->options->getUseRedirectParameterIfPresent());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUseRedirectParameterIfPresent
     */
    public function testGetUseRedirectParameterIfPresent()
    {
        $this->assertTrue($this->options->getUseRedirectParameterIfPresent());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUserLoginWidgetViewTemplate
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setUserLoginWidgetViewTemplate
     */
    public function testSetGetUserLoginWidgetViewTemplate()
    {
        $this->options->setUserLoginWidgetViewTemplate('zfcUser.phtml');
        $this->assertEquals('zfcUser.phtml', $this->options->getUserLoginWidgetViewTemplate());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUserLoginWidgetViewTemplate
     */
    public function testGetUserLoginWidgetViewTemplate()
    {
        $this->assertEquals('zfc-user/user/login.phtml', $this->options->getUserLoginWidgetViewTemplate());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableRegistration
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setEnableRegistration
     */
    public function testSetGetEnableRegistration()
    {
        $this->options->setEnableRegistration(false);
        $this->assertFalse($this->options->getEnableRegistration());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableRegistration
     */
    public function testGetEnableRegistration()
    {
        $this->assertTrue($this->options->getEnableRegistration());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLoginFormTimeout
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setLoginFormTimeout
     */
    public function testSetGetLoginFormTimeout()
    {
        $this->options->setLoginFormTimeout(100);
        $this->assertEquals(100, $this->options->getLoginFormTimeout());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLoginFormTimeout
     */
    public function testGetLoginFormTimeout()
    {
        $this->assertEquals(300, $this->options->getLoginFormTimeout());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUserFormTimeout
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setUserFormTimeout
     */
    public function testSetGetUserFormTimeout()
    {
        $this->options->setUserFormTimeout(100);
        $this->assertEquals(100, $this->options->getUserFormTimeout());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUserFormTimeout
     */
    public function testGetUserFormTimeout()
    {
        $this->assertEquals(300, $this->options->getUserFormTimeout());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLoginAfterRegistration
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setLoginAfterRegistration
     */
    public function testSetGetLoginAfterRegistration()
    {
        $this->options->setLoginAfterRegistration(false);
        $this->assertFalse($this->options->getLoginAfterRegistration());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getLoginAfterRegistration
     */
    public function testGetLoginAfterRegistration()
    {
        $this->assertTrue($this->options->getLoginAfterRegistration());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableUserState
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setEnableUserState
     */
    public function testSetGetEnableUserState()
    {
        $this->options->setEnableUserState(true);
        $this->assertTrue($this->options->getEnableUserState());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableUserState
     */
    public function testGetEnableUserState()
    {
        $this->assertFalse($this->options->getEnableUserState());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getDefaultUserState
     */
    public function testGetDefaultUserState()
    {
        $this->assertEquals(1, $this->options->getDefaultUserState());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getDefaultUserState
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setDefaultUserState
     */
    public function testSetGetDefaultUserState()
    {
        $this->options->setDefaultUserState(3);
        $this->assertEquals(3, $this->options->getDefaultUserState());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getAllowedLoginStates
     */
    public function testGetAllowedLoginStates()
    {
        $this->assertEquals(array(null, 1), $this->options->getAllowedLoginStates());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getAllowedLoginStates
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setAllowedLoginStates
     */
    public function testSetGetAllowedLoginStates()
    {
        $this->options->setAllowedLoginStates(array(2, 5, null));
        $this->assertEquals(array(2, 5, null), $this->options->getAllowedLoginStates());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getAuthAdapters
     */
    public function testGetAuthAdapters()
    {
        $this->assertEquals(array(100 => 'ZfcUserPixelpin\Authentication\Adapter\Db'), $this->options->getAuthAdapters());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getAuthAdapters
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setAuthAdapters
     */
    public function testSetGetAuthAdapters()
    {
        $this->options->setAuthAdapters(array(40 => 'SomeAdapter'));
        $this->assertEquals(array(40 => 'SomeAdapter'), $this->options->getAuthAdapters());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getAuthIdentityFields
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setAuthIdentityFields
     */
    public function testSetGetAuthIdentityFields()
    {
        $this->options->setAuthIdentityFields(array('username'));
        $this->assertEquals(array('username'), $this->options->getAuthIdentityFields());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getAuthIdentityFields
     */
    public function testGetAuthIdentityFields()
    {
        $this->assertEquals(array('email'), $this->options->getAuthIdentityFields());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableUsername
     */
    public function testGetEnableUsername()
    {
        $this->assertFalse($this->options->getEnableUsername());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableUsername
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setEnableUsername
     */
    public function testSetGetEnableUsername()
    {
        $this->options->setEnableUsername(true);
        $this->assertTrue($this->options->getEnableUsername());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableDisplayName
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setEnableDisplayName
     */
    public function testSetGetEnableDisplayName()
    {
        $this->options->setEnableDisplayName(true);
        $this->assertTrue($this->options->getEnableDisplayName());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getEnableDisplayName
     */
    public function testGetEnableDisplayName()
    {
        $this->assertFalse($this->options->getEnableDisplayName());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUseRegistrationFormCaptcha
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setUseRegistrationFormCaptcha
     */
    public function testSetGetUseRegistrationFormCaptcha()
    {
        $this->options->setUseRegistrationFormCaptcha(true);
        $this->assertTrue($this->options->getUseRegistrationFormCaptcha());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUseRegistrationFormCaptcha
     */
    public function testGetUseRegistrationFormCaptcha()
    {
        $this->assertFalse($this->options->getUseRegistrationFormCaptcha());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUserEntityClass
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setUserEntityClass
     */
    public function testSetGetUserEntityClass()
    {
        $this->options->setUserEntityClass('zfcUser');
        $this->assertEquals('zfcUser', $this->options->getUserEntityClass());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getUserEntityClass
     */
    public function testGetUserEntityClass()
    {
        $this->assertEquals('ZfcUserPixelpin\Entity\User', $this->options->getUserEntityClass());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getPasswordCost
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setPasswordCost
     */
    public function testSetGetPasswordCost()
    {
        $this->options->setPasswordCost(10);
        $this->assertEquals(10, $this->options->getPasswordCost());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getPasswordCost
     */
    public function testGetPasswordCost()
    {
        $this->assertEquals(14, $this->options->getPasswordCost());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getTableName
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setTableName
     */
    public function testSetGetTableName()
    {
        $this->options->setTableName('zfcUser');
        $this->assertEquals('zfcUser', $this->options->getTableName());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getTableName
     */
    public function testGetTableName()
    {
        $this->assertEquals('user', $this->options->getTableName());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getFormCaptchaOptions
     * @covers ZfcUserPixelpin\Options\ModuleOptions::setFormCaptchaOptions
     */
    public function testSetGetFormCaptchaOptions()
    {
        $expected = array(
            'class'   => 'someClass',
            'options' => array(
                'anOption' => 3,
            ),
        );
        $this->options->setFormCaptchaOptions($expected);
        $this->assertEquals($expected, $this->options->getFormCaptchaOptions());
    }

    /**
     * @covers ZfcUserPixelpin\Options\ModuleOptions::getFormCaptchaOptions
     */
    public function testGetFormCaptchaOptions()
    {
        $expected = array(
            'class'   => 'figlet',
            'options' => array(
                'wordLen'    => 5,
                'expiration' => 300,
                'timeout'    => 300,
            ),
        );
        $this->assertEquals($expected, $this->options->getFormCaptchaOptions());
    }
}
