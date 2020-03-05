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

namespace Broadway\UuidGenerator\Converter;

use Ramsey\Uuid\Uuid;

class BinaryUuidConverter implements BinaryUuidConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public static function fromString(string $uuid): string
    {
        return Uuid::fromString($uuid)->getBytes();
    }

    /**
     * {@inheritdoc}
     */
    public static function fromBytes(string $bytes): string
    {
        return Uuid::fromBytes($bytes)->toString();
    }
}
