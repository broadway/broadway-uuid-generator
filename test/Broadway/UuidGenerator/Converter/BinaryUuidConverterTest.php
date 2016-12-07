<?php

/*
 * This file is part of the broadway/uuid-generator package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Broadway\UuidGenerator\Converter;

use Broadway\UuidGenerator\TestCase;

class BinaryUuidConverterTest extends TestCase
{
    /**
     * @test
     */
    public function it_converts_string_uuid_to_binary_uuid()
    {
        $binary = BinaryUuidConverter::fromString('260b70eb-a5b7-4fde-916a-4cc021745c13');

        $this->assertEquals('0x260b70eba5b74fde916a4cc021745c13', '0x' . bin2hex($binary));
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid UUID string: yolo
     */
    public function it_throws_when_converting_invalid_string_uuid_to_binary_uuid()
    {
        BinaryUuidConverter::fromString('YOLO');
    }

    /**
     * @test
     */
    public function it_converts_binary_uuid_to_string_uuid()
    {
        $this->assertEquals(
            '260b70eb-a5b7-4fde-916a-4cc021745c13',
            BinaryUuidConverter::fromBytes(hex2bin('260b70eba5b74fde916a4cc021745c13'))
        );
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $bytes string should contain 16 characters.
     */
    public function it_throws_when_converting_invalid_binary_uuid_to_string_uuid()
    {
        BinaryUuidConverter::fromBytes('YOLO');
    }
}
