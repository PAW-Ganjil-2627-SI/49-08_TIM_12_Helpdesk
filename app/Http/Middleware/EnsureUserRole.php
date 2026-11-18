<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        // 1. Jika belum login sama sekali, lempar ke login
        if (! $user) {
            return redirect()->route('login');
        }

        // 2. Jika role user tidak ada dalam daftar yang diizinkan
        if ($roles === [] || ! in_array($user->role, $roles, true)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Akses ditolak. Akun kamu nggak punya izin.',
                ], Response::HTTP_FORBIDDEN);
            }

            // Batalkan akses dengan HTTP status 403 Forbidden
            abort(Response::HTTP_FORBIDDEN, 'Akses ditolak.');
        }

        // 3. Lolos pemeriksaan, lanjut ke Controller
        return $next($request);
    }
}
