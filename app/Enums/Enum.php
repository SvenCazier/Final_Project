<?php

namespace App\Enums;

abstract class Enum
{
    public static function values(): array
    {
        $reflectionClass = new \ReflectionClass(static::class);
        $constants = $reflectionClass->getConstants();

        return array_values($constants);
    }
}
