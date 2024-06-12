<?php

namespace App\Enums;

class Locale extends Enum
{
    public const ENGLISH = "en";
    public const DUTCH = "nl";
    public const FRENCH = "fr";
    public const SPANISH = "es";

    public static function getFullLanguageName(string $locale): string
    {
        $languages = [
            self::ENGLISH => __("locales.english"),
            self::DUTCH => __("locales.dutch"),
            self::FRENCH => __("locales.french"),
            self::SPANISH => __("locales.spanish"),
        ];

        return $languages[$locale] ?? $locale;
    }
}
