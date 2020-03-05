<?php

declare(strict_types=1);

/*
 * This file is part of the broadway/uuid-generator package.
 *
 * (c) 2020 Broadway project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Broadway\UuidGenerator\Rfc4122;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class Version4GeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_generate_a_string(): void
    {
        $generator = new Version4Generator();
        $uuid = $generator->generate();

        $this->assertIsString($uuid);
    }

    /**
     * @test
     */
    public function it_should_generate_a_version_4_uuid(): void
    {
        $generator = new Version4Generator();
        $uuid = $generator->generate();

        $uuidObject = Uuid::fromString($uuid);

        $this->assertEquals(4, $uuidObject->getVersion());
    }
}
