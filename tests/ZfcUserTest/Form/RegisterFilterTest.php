<?php

namespace ZfcUserPixelpinTest\Form;

use ZfcUserPixelpin\Form\RegisterFilter as Filter;

class RegisterFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZfcUserPixelpin\Form\RegisterFilter::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $options->expects($this->once())
                ->method('getEnableUsername')
                ->will($this->returnValue(true));
        $options->expects($this->once())
                ->method('getEnableDisplayName')
                ->will($this->returnValue(true));

        $emailValidator = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();
        $usernameValidator = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();

        $filter = new Filter($emailValidator, $usernameValidator, $options);

        $inputs = $filter->getInputs();
        $this->assertArrayHasKey('username', $inputs);
        $this->assertArrayHasKey('email', $inputs);
        $this->assertArrayHasKey('display_name', $inputs);
        $this->assertArrayHasKey('password', $inputs);
        $this->assertArrayHasKey('passwordVerify', $inputs);
    }

    public function testSetGetEmailValidator()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $validatorInit = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();
        $validatorNew = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();

        $filter = new Filter($validatorInit, $validatorInit, $options);

        $this->assertSame($validatorInit, $filter->getEmailValidator());
        $filter->setEmailValidator($validatorNew);
        $this->assertSame($validatorNew, $filter->getEmailValidator());
    }

    public function testSetGetUsernameValidator()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $validatorInit = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();
        $validatorNew = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();

        $filter = new Filter($validatorInit, $validatorInit, $options);

        $this->assertSame($validatorInit, $filter->getUsernameValidator());
        $filter->setUsernameValidator($validatorNew);
        $this->assertSame($validatorNew, $filter->getUsernameValidator());
    }

    public function testSetGetOptions()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $optionsNew = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $validatorInit = $this->getMockBuilder('ZfcUserPixelpin\Validator\NoRecordExists')->disableOriginalConstructor()->getMock();
        $filter = new Filter($validatorInit, $validatorInit, $options);

        $this->assertSame($options, $filter->getOptions());
        $filter->setOptions($optionsNew);
        $this->assertSame($optionsNew, $filter->getOptions());
    }
}
