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

namespace Broadway\UuidGenerator\Testing;

use PHPUnit\Framework\TestCase;

class MockUuidSequenceGeneratorTest extends TestCase
{
    /**
     * @var string[]
     */
    private $uuids = [
        'e2d0c739-0001-434c-8d7a-03e29b400566',
        'e2d0c739-0002-434c-8d7a-03e29b400566',
        'e2d0c739-0003-434c-8d7a-03e29b400566',
        'e2d0c739-0004-434c-8d7a-03e29b400566',
    ];

    /**
     * @test
     */
    public function it_generates_a_string(): void
    {
        $generator = $this->createMockUuidGenerator();
        $uuid = $generator->generate();

        $this->assertIsString($uuid);
    }

    /**
     * @test
     */
    public function it_generates_the_same_string(): void
    {
        $generator = $this->createMockUuidGenerator();

        foreach ($this->uuids as $uuid) {
            $this->assertEquals($uuid, $generator->generate());
        }
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_pool_is_empty(): void
    {
        $this->expectException('RuntimeException');
        $generator = $this->createMockUuidGenerator();

        for ($i = 0; $i < 5; ++$i) {
            $generator->generate();
        }
    }

    private function createMockUuidGenerator(): MockUuidSequenceGenerator
    {
        return new MockUuidSequenceGenerator($this->uuids);
    }
}
