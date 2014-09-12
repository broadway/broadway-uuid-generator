<?php

/*
 * This file is part of the broadway/uuid-generator package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/bootstrap.php';

function generateAndOutput5(Broadway\UuidGenerator\UuidGeneratorInterface $generator) {
    for ($i = 0; $i < 5; $i++) {
        echo sprintf("[%d] %s\n", $i, $generator->generate());
    }
}

echo "A random generated uuid:\n";
$randomGenerator = new Broadway\UuidGenerator\Rfc4122\Version4Generator();
generateAndOutput5($randomGenerator);

echo "\n";

echo "A generator that will always return the same uuid (for testing):\n";
$mockUuidGenerator = new Broadway\UuidGenerator\Testing\MockUuidGenerator(42);
generateAndOutput5($mockUuidGenerator);

echo "\n";

echo "A generator that will always return the same sequence of uuids and throw an exception if depleted (for testing):\n";
$mockUuidSequenceGenerator = new Broadway\UuidGenerator\Testing\MockUuidSequenceGenerator(array(1, 1, 2, 3, 5, 8, 13, 21));
generateAndOutput5($mockUuidSequenceGenerator);
