<?php

namespace ZfcUserPixelpinTest\Validator;

use ZfcUserPixelpin\Validator\RecordExists as Validator;

class RecordExistsTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected $mapper;

    public function setUp()
    {
        $options = array('key' => 'username');
        $validator = new Validator($options);
        $this->validator = $validator;

        $mapper = $this->getMock('ZfcUserPixelpin\Mapper\UserInterface');
        $this->mapper = $mapper;

        $validator->setMapper($mapper);
    }

    /**
     * @covers ZfcUserPixelpin\Validator\RecordExists::isValid
     */
    public function testIsValid()
    {
        $this->mapper->expects($this->once())
                     ->method('findByUsername')
                     ->with('zfcUser')
                     ->will($this->returnValue('zfcUser'));

        $result = $this->validator->isValid('zfcUser');
        $this->assertTrue($result);
    }

    /**
     * @covers ZfcUserPixelpin\Validator\RecordExists::isValid
     */
    public function testIsInvalid()
    {
        $this->mapper->expects($this->once())
                     ->method('findByUsername')
                     ->with('zfcUser')
                     ->will($this->returnValue(false));

        $result = $this->validator->isValid('zfcUser');
        $this->assertFalse($result);

        $options = $this->validator->getOptions();
        $this->assertArrayHasKey(\ZfcUserPixelpin\Validator\AbstractRecord::ERROR_NO_RECORD_FOUND, $options['messages']);
        $this->assertEquals($options['messageTemplates'][\ZfcUserPixelpin\Validator\AbstractRecord::ERROR_NO_RECORD_FOUND], $options['messages'][\ZfcUserPixelpin\Validator\AbstractRecord::ERROR_NO_RECORD_FOUND]);
    }
}
