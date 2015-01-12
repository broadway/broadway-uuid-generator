<?php

/*
 * This file is part of the broadway/uuid-generator package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Broadway\UuidGenerator\Rfc4122;

use Broadway\UuidGenerator\TestCase;
use Rhumsaa\Uuid\Uuid;

class Version4BinaryGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_generate_a_string()
    {
        $generator = new Version4BinaryGenerator();
        $uuid = $generator->generate();

        $this->assertInternalType('string', $uuid);
        $this->assertEquals(16, strlen($uuid));
    }

    /**
     * @test
     */
    public function it_should_generate_a_version_4_uuid()
    {
        $generator = new Version4BinaryGenerator();
        $uuid = $generator->generate();

        $uuidObject = Uuid::fromBytes($uuid);

        $this->assertEquals(4 , $uuidObject->getVersion());
    }
}

