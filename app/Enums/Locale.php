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
            self::ENGLISH => __("languages.english"),
            self::DUTCH => __("languages.dutch"),
            self::FRENCH => __("languages.french"),
            self::SPANISH => __("languages.spanish"),
        ];

        return $languages[$locale] ?? $locale;
    }
}
