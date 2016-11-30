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

use Ramsey\Uuid\Uuid;

class BinaryUuidConverter implements BinaryUuidConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public static function fromString($uuid)
    {
        return Uuid::fromString($uuid)->getBytes();
    }

    /**
     * {@inheritdoc}
     */
    public static function fromBytes($bytes)
    {
        return Uuid::fromBytes($bytes)->toString();
    }
}
