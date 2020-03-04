<?php

declare(strict_types=1);

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

/**
 * Mock uuid generator that always generates the same id.
 */
class MockUuidGenerator implements UuidGeneratorInterface
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @param string $uuid
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function generate()
    {
        return $this->uuid;
    }
}
