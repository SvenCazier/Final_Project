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

        $locale = strlen($request->segment(1)) === 2 ? $request->segment(1) : null;

        if (is_null($locale)) $locale = "en";  //return redirect('/' . Locale::ENGLISH . $request->getPathInfo());
        if (!in_array($locale, Locale::values())) abort(404);

        App::setLocale($locale);
        return $next($request);
    }
}
