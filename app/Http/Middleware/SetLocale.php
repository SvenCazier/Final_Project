<?php

namespace App\Http\Middleware;

use App\Enums\Locale;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {

        $browserLanguage = strtolower(explode('-', explode(',', $request->header('Accept-Language'))[0])[0]);
        $language = match ($browserLanguage) {
            Locale::DUTCH => Locale::DUTCH,
            Locale::FRENCH => Locale::FRENCH,
            Locale::SPANISH => Locale::SPANISH,
            default => Locale::ENGLISH,
        };

        $locale = strlen($request->segment(1)) === 2 ? $request->segment(1) : null;

        if (is_null($locale)) return redirect('/' . $language . $request->getPathInfo());
        if (!in_array($locale, Locale::values())) abort(404);

        App::setLocale($locale);
        return $next($request);
    }
}
