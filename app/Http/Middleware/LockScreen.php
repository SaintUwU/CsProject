<?php
// app/Http/Middleware/LockScreen.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LockScreen
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && session('locked', false)) {
            return redirect()->route('lockscreen');
        }

        return $next($request);
    }
}
