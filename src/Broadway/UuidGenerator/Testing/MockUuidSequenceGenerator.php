<?php

/*
 * This file is part of the broadway/uuid-generator package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
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
    private $uuids;

    /**
     * @param string[] $uuids
     */
    public function __construct(array $uuids = array())
    {
        $this->setUuids($uuids);
    }

    /**
     * @param string[] $uuids
     */
    public function setUuids(array $uuids)
    {
        $this->uuids = $uuids;
    }

    /**
     * @return string
     */
    public function generate()
    {
        if (count($this->uuids) === 0) {
            throw new RuntimeException('No more uuids in sequence');
        }

        return array_shift($this->uuids);
    }
}
