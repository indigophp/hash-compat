<?php

class HashPbkdf2Test extends \PHPUnit_Framework_TestCase
{
    public function invalidStringTypeProvider()
    {
        return array(
            array(new stdClass),
            array(array()),
        );
    }

    public function invalidLongTypeProvider()
    {
        return array(
            array(new stdClass),
            array(array()),
            array(''),
            array('a'),
        );
    }

    public function invalidBooleanTypeProvider()
    {
        return array(
            array(new stdClass),
            array(array()),
        );
    }

    public function invalidPositiveIntegerProvider()
    {
        return array(
            array(null),
            array(false),
            array(-1),
            array(-1.0),
            array('-1'),
        );
    }

    public function invalidNonNegativeIntegerProvider()
    {
        return array(
            array(-1),
            array(-1.0),
            array('-1'),
        );
    }

    public function validDataProvider()
    {
        return array(
            array(
                array('ripemd256', '54af601d1e984', '54af601d1e9bb', 1, 0, false),
                '2b3819956bafb03b7f2f38a57675647597f271f4a15a1c8b52e10089cf055699',
            ),
            array(
                array('snefru', '54af601d1e9fd', '54af601d1ea32', 1, 0, false),
                'eafc508ab039928d9470deaa7651628882e91e2c3e2a408809b150c5aa7d884f',
            ),
            array(
                array('haval192,3', '54af601d1ea7c', '54af601d1eab1', 1, 0, false),
                '95ee3785f758245ba16ed82f7e1467168b706544c1d59fff',
            ),
            array(
                array('ripemd320', '54af601d1eaee', '54af601d1eb23', 1, 12, false),
                'd37b3e1f9190',
            ),
            array(
                array('gost', '54af601d1eb5d', '54af601d1eb92', 1, 0, false),
                'a9f2f5d8b4b239696b6300609051ff6e229baf123671b363cf8ac9606adc0969',
            ),
            array(
                array('haval160,4', '54af601d1ebd2', '54af601d1ec08', 1, 0, false),
                'e4afb928afabe71381223ec1218a53eb4d86b430',
            ),
            array(
                array('ripemd256', '54af601d1ec43', '54af601d1ec78', 1, 0, false),
                '4a9bf2c3df878cbfd9c5d925975c6c5c87923af81f3f63df458bf6b0c216ee36',
            ),
            array(
                array('haval224,5', '54af601d1ecb2', '54af601d1ece7', 1, 5, false),
                'a7ebf',
            ),
            array(
                array('haval128,3', '54af601d1ed23', '54af601d1ed58', 1, 0, false),
                '0f7c165a7fd9e6bdfb563edb7e42c7dc',
            ),
            array(
                array('snefru256', '54af601d1ed93', '54af601d1edcd', 1, 0, false),
                '772b52c2cc29ed1fee36927ebefba66148957186fe08bb7b8e2008a4b32b54ef',
            ),
            array(
                array('haval192,3', '54af601d1ee05', '54af601d1ee3a', 1, 0, false),
                '3fe0661a999b20168ea6e13eadc1335736d7a49ddf4d8509',
            ),
        );
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_pbkdf2() expects at least 4 parameters, 0 given
     */
    public function testZeroArgs()
    {
        hash_pbkdf2();
    }

    public function testZeroArgsReturnValue()
    {
        $actual = @hash_pbkdf2();

        $this->assertNull($actual);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_pbkdf2() expects at least 4 parameters, 1 given
     */
    public function testOneArg()
    {
        hash_pbkdf2('');
    }

    public function testOneArgReturnValue()
    {
        $actual = @hash_pbkdf2('');

        $this->assertNull($actual);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_pbkdf2() expects at least 4 parameters, 2 given
     */
    public function testTwoArgs()
    {
        hash_pbkdf2('', '');
    }

    public function testTwoArgsReturnValue()
    {
        $actual = @hash_pbkdf2('', '');

        $this->assertNull($actual);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_pbkdf2() expects at least 4 parameters, 3 given
     */
    public function testThreeArgs()
    {
        hash_pbkdf2('', '', '');
    }

    public function testThreeArgsReturnValue()
    {
        $actual = @hash_pbkdf2('', '', '');

        $this->assertNull($actual);
    }

    /**
     * @dataProvider invalidStringTypeProvider
     */
    public function testInvalidAlgo($string)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            sprintf('hash_pbkdf2() expects parameter 1 to be string, %s given', gettype($string))
        );

        hash_pbkdf2($string, '', '', 1);
    }

    /**
     * @dataProvider invalidStringTypeProvider
     */
    public function testInvalidAlgoReturnValue($string)
    {
        $actual = @hash_pbkdf2($string, '', '', 1);

        $this->assertNull($actual);
    }

    /**
     * @dataProvider invalidStringTypeProvider
     */
    public function testInvalidPassword($string)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            sprintf('hash_pbkdf2() expects parameter 2 to be string, %s given', gettype($string))
        );

        hash_pbkdf2('', $string, '', 1);
    }

    /**
     * @dataProvider invalidStringTypeProvider
     */
    public function testInvalidPasswordReturnValue($string)
    {
        $actual = @hash_pbkdf2('', $string, '', 1);

        $this->assertNull($actual);
    }

    /**
     * @dataProvider invalidStringTypeProvider
     */
    public function testInvalidSalt($string)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            sprintf('hash_pbkdf2() expects parameter 3 to be string, %s given', gettype($string))
        );

        hash_pbkdf2('', '', $string, 1);
    }

    /**
     * @dataProvider invalidStringTypeProvider
     */
    public function testInvalidSaltReturnValue($string)
    {
        $actual = @hash_pbkdf2('', '', $string, 1);

        $this->assertNull($actual);
    }

    /**
     * @dataProvider invalidLongTypeProvider
     */
    public function testInvalidIterations($long)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            sprintf('hash_pbkdf2() expects parameter 4 to be long, %s given', gettype($long))
        );

        hash_pbkdf2('', '', '', $long);
    }

    /**
     * @dataProvider invalidLongTypeProvider
     */
    public function testInvalidIterationsReturnValue($long)
    {
        $actual = @hash_pbkdf2('', '', '', $long);

        $this->assertNull($actual);
    }

    /**
     * @dataProvider invalidLongTypeProvider
     */
    public function testInvalidLength($long)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            sprintf('hash_pbkdf2() expects parameter 5 to be long, %s given', gettype($long))
        );

        hash_pbkdf2('', '', '', 1, $long);
    }

    /**
     * @dataProvider invalidLongTypeProvider
     */
    public function testInvalidLengthReturnValue($long)
    {
        $actual = @hash_pbkdf2('', '', '', 1, $long);

        $this->assertNull($actual);
    }

    /**
     * @dataProvider invalidBooleanTypeProvider
     */
    public function testInvalidRawOutput($boolean)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            sprintf('hash_pbkdf2() expects parameter 6 to be boolean, %s given', gettype($boolean))
        );

        hash_pbkdf2('', '', '', 1, 1, $boolean);
    }

    /**
     * @dataProvider invalidBooleanTypeProvider
     */
    public function testInvalidRawOutputReturnValue($boolean)
    {
        $actual = @hash_pbkdf2('', '', '', 1, 1, $boolean);

        $this->assertNull($actual);
    }

    /**
     * @expectedException        PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage hash_pbkdf2(): Unknown hashing algorithm: unknown
     */
    public function testUnknownHashingAlgo()
    {
        hash_pbkdf2('unknown', '', '', 1);
    }

    public function testUnknownHashingAlgoReturnValue()
    {
        $actual = @hash_pbkdf2('unknown', '', '', 1);

        $this->assertFalse($actual);
    }

    /**
     * @dataProvider invalidPositiveIntegerProvider
     */
    public function testInvalidPositiveInteger($integer)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            'hash_pbkdf2(): Iterations must be a positive integer: '. (int) $integer
        );

        hash_pbkdf2('md5', '', '', $integer);
    }

    /**
     * @dataProvider invalidPositiveIntegerProvider
     */
    public function testInvalidPositiveIntegerReturnValue($integer)
    {
        $actual = @hash_pbkdf2('md5', '', '', $integer);

        $this->assertFalse($actual);
    }

    /**
     * @dataProvider invalidNonNegativeIntegerProvider
     */
    public function testInvalidNonNegativeInteger($integer)
    {
        $this->setExpectedException(
            'PHPUnit_Framework_Error_Warning',
            'hash_pbkdf2(): Length must be greater than or equal to 0: '. (int) $integer
        );

        hash_pbkdf2('md5', '', '', 1, $integer);
    }

    /**
     * @dataProvider invalidNonNegativeIntegerProvider
     */
    public function testInvalidNonNegativeIntegerReturnValue($integer)
    {
        $actual = @hash_pbkdf2('md5', '', '', 1, $integer);

        $this->assertFalse($actual);
    }

    /**
     * @dataProvider validDataProvider
     */
    public function testValidHash($arguments, $expected)
    {
        $actual = call_user_func_array('hash_pbkdf2', $arguments);

        $this->assertEquals($expected, $actual);
    }
}
