<?php

namespace ZfcUserPixelpinTest\Entity;

use ZfcUserPixelpin\Entity\User as Entity;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $user;

    public function setUp()
    {
        $user = new Entity;
        $this->user = $user;
    }

    /**
     * @covers ZfcUserPixelpin\Entity\User::setId
     * @covers ZfcUserPixelpin\Entity\User::getId
     */
    public function testSetGetId()
    {
        $this->user->setId(1);
        $this->assertEquals(1, $this->user->getId());
    }

    /**
     * @covers ZfcUserPixelpin\Entity\User::setUsername
     * @covers ZfcUserPixelpin\Entity\User::getUsername
     */
    public function testSetGetUsername()
    {
        $this->user->setUsername('zfcUser');
        $this->assertEquals('zfcUser', $this->user->getUsername());
    }

    /**
     * @covers ZfcUserPixelpin\Entity\User::setDisplayName
     * @covers ZfcUserPixelpin\Entity\User::getDisplayName
     */
    public function testSetGetDisplayName()
    {
        $this->user->setDisplayName('Zfc User');
        $this->assertEquals('Zfc User', $this->user->getDisplayName());
    }

    /**
     * @covers ZfcUserPixelpin\Entity\User::setEmail
     * @covers ZfcUserPixelpin\Entity\User::getEmail
     */
    public function testSetGetEmail()
    {
        $this->user->setEmail('zfcUser@zfcUser.com');
        $this->assertEquals('zfcUser@zfcUser.com', $this->user->getEmail());
    }

    /**
     * @covers ZfcUserPixelpin\Entity\User::setPassword
     * @covers ZfcUserPixelpin\Entity\User::getPassword
     */
    public function testSetGetPassword()
    {
        $this->user->setPassword('zfcUser');
        $this->assertEquals('zfcUser', $this->user->getPassword());
    }

    /**
     * @covers ZfcUserPixelpin\Entity\User::setState
     * @covers ZfcUserPixelpin\Entity\User::getState
     */
    public function testSetGetState()
    {
        $this->user->setState(1);
        $this->assertEquals(1, $this->user->getState());
    }
}
