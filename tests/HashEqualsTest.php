<?php

class HashEqualsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals() expects exactly 2 parameters, 0 given
     */
    public function testWithZeroArgs()
    {
        hash_equals();
    }

    public function testWithZeroArgsReturnValue()
    {
        $actual = @hash_equals();

        $this->assertNull($actual);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals() expects exactly 2 parameters, 1 given
     */
    public function testWithOneArg()
    {
        hash_equals('');
    }

    public function testWithOneArgReturnValue()
    {
        $actual = @hash_equals('');

        $this->assertNull($actual);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals(): Expected known_string to be a string, null given
     */
    public function testWithInvalidKnownString()
    {
        hash_equals(null, '');
    }

    public function testWithInvalidKnownStringReturnValue()
    {
        $actual = @hash_equals(null, '');

        $this->assertFalse($actual);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals(): Expected user_string to be a string, null given
     */
    public function testWithInvalidUserString()
    {
        hash_equals('', null);
    }

    public function testWithInvalidUserStringReturnValue()
    {
        $actual = @hash_equals('', null);

        $this->assertFalse($actual);
    }

    public function testDifferentLengths()
    {
        $actual = hash_equals('', ' ');

        $this->assertFalse($actual);
    }

    public function testDifferentStrings()
    {
        $actual = hash_equals('a', 'b');

        $this->assertFalse($actual);
    }

    public function testEqualStrings()
    {
        $actual = hash_equals('a', 'a');

        $this->assertTrue($actual);
    }
}
