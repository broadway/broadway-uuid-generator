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

use Broadway\UuidGenerator\UuidGeneratorInterface;
use RuntimeException;

/**
 * Mock uuid generator that always generates a given sequence of uuids.
 */
class MockUuidSequenceGenerator implements UuidGeneratorInterface
{
    /**
     * @var string[]
     */
    private $uuids;

    /**
     * @param string[] $uuids
     */
    public function __construct(array $uuids)
    {
        $this->uuids = (array) $uuids;
    }

    public function generate(): string
    {
        if (0 === count($this->uuids)) {
            throw new RuntimeException('No more uuids in sequence');
        }

        return array_shift($this->uuids);
    }
}
