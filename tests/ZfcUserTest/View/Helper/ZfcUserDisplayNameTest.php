<?php

namespace ZfcUserPixelpinTest\View\Helper;

use ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName as ViewHelper;

class ZfcUserPixelpinDisplayNameTest extends \PHPUnit_Framework_TestCase
{
    protected $helper;

    protected $authService;

    protected $user;

    public function setUp()
    {
        $helper = new ViewHelper;
        $this->helper = $helper;

        $authService = $this->getMock('Zend\Authentication\AuthenticationService');
        $this->authService = $authService;

        $user = $this->getMock('ZfcUserPixelpin\Entity\User');
        $this->user = $user;

        $helper->setAuthService($authService);
    }

    /**
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::__invoke
     */
    public function testInvokeWithoutUserAndNotLoggedIn()
    {
        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(false));

        $result = $this->helper->__invoke(null);

        $this->assertFalse($result);
    }

    /**
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::__invoke
     * @expectedException ZfcUserPixelpin\Exception\DomainException
     */
    public function testInvokeWithoutUserButLoggedInWithWrongUserObject()
    {
        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(true));
        $this->authService->expects($this->once())
                          ->method('getIdentity')
                          ->will($this->returnValue(new \StdClass));

        $this->helper->__invoke(null);
    }

    /**
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::__invoke
     */
    public function testInvokeWithoutUserButLoggedInWithDisplayName()
    {
        $this->user->expects($this->once())
                   ->method('getDisplayName')
                   ->will($this->returnValue('zfcUser'));

        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(true));
        $this->authService->expects($this->once())
                          ->method('getIdentity')
                          ->will($this->returnValue($this->user));

        $result = $this->helper->__invoke(null);

        $this->assertEquals('zfcUser', $result);
    }

    /**
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::__invoke
     */
    public function testInvokeWithoutUserButLoggedInWithoutDisplayNameButWithUsername()
    {
        $this->user->expects($this->once())
                   ->method('getDisplayName')
                   ->will($this->returnValue(null));
        $this->user->expects($this->once())
                   ->method('getUsername')
                   ->will($this->returnValue('zfcUser'));

        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(true));
        $this->authService->expects($this->once())
                          ->method('getIdentity')
                          ->will($this->returnValue($this->user));

        $result = $this->helper->__invoke(null);

        $this->assertEquals('zfcUser', $result);
    }

    /**
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::__invoke
     */
    public function testInvokeWithoutUserButLoggedInWithoutDisplayNameAndWithOutUsernameButWithEmail()
    {
        $this->user->expects($this->once())
                   ->method('getDisplayName')
                   ->will($this->returnValue(null));
        $this->user->expects($this->once())
                   ->method('getUsername')
                   ->will($this->returnValue(null));
        $this->user->expects($this->once())
                   ->method('getEmail')
                   ->will($this->returnValue('zfcUser@zfcUser.com'));

        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(true));
        $this->authService->expects($this->once())
                          ->method('getIdentity')
                          ->will($this->returnValue($this->user));

        $result = $this->helper->__invoke(null);

        $this->assertEquals('zfcUser', $result);
    }

    /**
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::setAuthService
     * @covers ZfcUserPixelpin\View\Helper\ZfcUserPixelpinDisplayName::getAuthService
     */
    public function testSetGetAuthService()
    {
        // We set the authservice in setUp, so we dont have to set it again
        $this->assertSame($this->authService, $this->helper->getAuthService());
    }
}
