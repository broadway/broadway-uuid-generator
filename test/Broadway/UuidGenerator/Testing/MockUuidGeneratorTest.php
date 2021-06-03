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

class MockUuidGeneratorTest extends TestCase
{
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

        for ($i = 0; $i < 5; ++$i) {
            $this->assertEquals('e2d0c739-53ac-434c-8d7a-03e29b400566', $generator->generate());
        }
    }

    private function createMockUuidGenerator(): MockUuidGenerator
    {
        return new MockUuidGenerator('e2d0c739-53ac-434c-8d7a-03e29b400566');
    }
}
