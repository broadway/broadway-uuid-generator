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

class Version4GeneratorTest extends TestCase
{
    private $className;

    public function __construct()
    {
        $this->className = $this->getClassName();
    }

    /**
     * @test
     */
    public function it_should_generate_a_string()
    {
        $generator = new Version4Generator();
        $uuid = $generator->generate();

        $this->assertInternalType('string', $uuid);
    }

    /**
     * @test
     */
    public function it_should_generate_a_version_4_uuid()
    {
        $generator = new Version4Generator();
        $uuid = $generator->generate();

        $uuidObject = call_user_func([$this->className, 'fromString'], $uuid);

        $this->assertEquals(4 , $uuidObject->getVersion());
    }

    private function getClassName()
    {
        if (class_exists('Ramsey\Uuid\Uuid')) {
            return '\Ramsey\Uuid\Uuid';
        }

        if (class_exists('Rhumsaa\Uuid\Uuid')) {
            return '\Rhumsaa\Uuid\Uuid';
        }

        throw new LogicException('Version4Generator requires library ramsey/uuid.');
    }
}

