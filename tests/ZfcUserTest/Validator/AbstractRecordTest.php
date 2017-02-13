<?php

namespace ZfcUserPixelpinTest\Validator;

use ZfcUserPixelpinTest\Validator\TestAsset\AbstractRecordExtension;

class AbstractRecordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::__construct
     */
    public function testConstruct()
    {
        $options = array('key'=>'value');
        new AbstractRecordExtension($options);
    }

    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::__construct
     * @expectedException ZfcUserPixelpin\Validator\Exception\InvalidArgumentException
     * @expectedExceptionMessage No key provided
     */
    public function testConstructEmptyArray()
    {
        $options = array();
        new AbstractRecordExtension($options);
    }

    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::getMapper
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::setMapper
     */
    public function testGetSetMapper()
    {
        $options = array('key' => '');
        $validator = new AbstractRecordExtension($options);

        $this->assertNull($validator->getMapper());

        $mapper = $this->getMock('ZfcUserPixelpin\Mapper\UserInterface');
        $validator->setMapper($mapper);
        $this->assertSame($mapper, $validator->getMapper());
    }

    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::getKey
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::setKey
     */
    public function testGetSetKey()
    {
        $options = array('key' => 'username');
        $validator = new AbstractRecordExtension($options);

        $this->assertEquals('username', $validator->getKey());

        $validator->setKey('email');
        $this->assertEquals('email', $validator->getKey());
    }

    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::query
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid key used in ZfcUserPixelpin validator
     */
    public function testQueryWithInvalidKey()
    {
        $options = array('key' => 'zfcUser');
        $validator = new AbstractRecordExtension($options);

        $method = new \ReflectionMethod('ZfcUserPixelpinTest\Validator\TestAsset\AbstractRecordExtension', 'query');
        $method->setAccessible(true);

        $method->invoke($validator, array('test'));
    }

    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::query
     */
    public function testQueryWithKeyUsername()
    {
        $options = array('key' => 'username');
        $validator = new AbstractRecordExtension($options);

        $mapper = $this->getMock('ZfcUserPixelpin\Mapper\UserInterface');
        $mapper->expects($this->once())
               ->method('findByUsername')
               ->with('test')
               ->will($this->returnValue('ZfcUserPixelpin'));

        $validator->setMapper($mapper);

        $method = new \ReflectionMethod('ZfcUserPixelpinTest\Validator\TestAsset\AbstractRecordExtension', 'query');
        $method->setAccessible(true);

        $result = $method->invoke($validator, 'test');

        $this->assertEquals('ZfcUserPixelpin', $result);
    }

    /**
     * @covers ZfcUserPixelpin\Validator\AbstractRecord::query
     */
    public function testQueryWithKeyEmail()
    {
        $options = array('key' => 'email');
        $validator = new AbstractRecordExtension($options);

        $mapper = $this->getMock('ZfcUserPixelpin\Mapper\UserInterface');
        $mapper->expects($this->once())
            ->method('findByEmail')
            ->with('test@test.com')
            ->will($this->returnValue('ZfcUserPixelpin'));

        $validator->setMapper($mapper);

        $method = new \ReflectionMethod('ZfcUserPixelpinTest\Validator\TestAsset\AbstractRecordExtension', 'query');
        $method->setAccessible(true);

        $result = $method->invoke($validator, 'test@test.com');

        $this->assertEquals('ZfcUserPixelpin', $result);
    }
}
