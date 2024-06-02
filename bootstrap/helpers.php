<?php

use Illuminate\Support\Arr;

function __($key = null, $replace = [], $locale = null)
{
    // Default behavior
    if (is_null($key)) return $key;
    if (trans()->has($key)) return trans($key, $replace, $locale);

    // Search in .json file
    $search = Arr::get(trans()->get('*'), $key);
    if ($search !== null) return $search;

    // Return .json fallback
    $fallback = Arr::get(trans()->get('*', [], config('app.fallback_locale')), $key);
    if ($fallback !== null) return $fallback;

    // Return key name if not found
    else return $key;
}
