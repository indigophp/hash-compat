<?php

class HashEqualsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException        PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals() expects exactly 2 parameters, 0 given
     */
    public function testZeroArgs()
    {
        hash_equals();
    }

    public function testZeroArgsReturnValue()
    {
        $actual = @hash_equals();

        $this->assertNull($actual);
    }

    /**
     * @expectedException        PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals() expects exactly 2 parameters, 1 given
     */
    public function testOneArg()
    {
        hash_equals('');
    }

    public function testOneArgReturnValue()
    {
        $actual = @hash_equals('');

        $this->assertNull($actual);
    }

    /**
     * @expectedException        PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals(): Expected known_string to be a string, null given
     */
    public function testInvalidKnownString()
    {
        if (defined('HHVM_VERSION')) {
            $this->setExpectedException(
                'PHPUnit_Framework_Error_Warning',
                'hash_equals(): Expected known_string to be a string, NULL given'
            );
        }

        hash_equals(null, '');
    }

    public function testInvalidKnownStringReturnValue()
    {
        $actual = @hash_equals(null, '');

        $this->assertFalse($actual);
    }

    /**
     * @expectedException        PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_equals(): Expected user_string to be a string, null given
     */
    public function testInvalidUserString()
    {
        if (defined('HHVM_VERSION')) {
            $this->setExpectedException(
                'PHPUnit_Framework_Error_Warning',
                'hash_equals(): Expected user_string to be a string, NULL given'
            );
        }

        hash_equals('', null);
    }

    public function testInvalidUserStringReturnValue()
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
