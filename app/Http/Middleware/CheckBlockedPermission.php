<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\PermissionHelper;

class CheckBlockedPermission {
    public function handle(Request $request, Closure $next) {
        $permissions = $request->attributes->get('middleware_permissions', []);
        $expectsJson = $request->attributes->get('middleware_expects_json', false);

        if (empty($permissions)) {
            return $next($request);
        }

        if (!is_array($permissions)) {
            $permissions = [$permissions];
        }

        foreach ($permissions as $permission) {
            $user = auth()->user();

            // 1. Pastikan user punya permission itu
            if (!$user->hasPermissionTo($permission)) {
                return $this->deny("You do not have permission!", $expectsJson);
            }

            // 2. Cek kalau permission ini diblokir
            if (PermissionHelper::isPermissionBlocked($user->id, $permission)) {
                return $this->deny("Permission blocked!", $expectsJson);
            }
        }

        return $next($request);
    }

    protected function deny($message, $expectsJson) {
        if ($expectsJson || request()->expectsJson()) {
            return response()->json([
                'message' => $message,
            ], 403);
        }

        abort(403, $message);
    }
}
