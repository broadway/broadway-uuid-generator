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

use Broadway\UuidGenerator\UuidGeneratorInterface;
use Ramsey\Uuid\Uuid;

/**
 * Generates a version4 uuid as defined in RFC 4122.
 */
class Version4Generator implements UuidGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        return Uuid::uuid4()->toString();
    }
}
