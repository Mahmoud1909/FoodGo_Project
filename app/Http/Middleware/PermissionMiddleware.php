<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null, $routes = null)
    {
        if (!auth()->check()) {
            // User is not authenticated, redirect to login
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated',
                    'error' => 'You must be logged in to access this resource.'
                ], 401);
            }
            return redirect()->route('login')->with('error', 'Please login to continue');
        }

        $user = auth()->user();
        
        // Check if user has a valid role_id
        if (empty($user->role_id)) {
            \Log::warning('User ' . $user->id . ' has no role_id assigned');
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized',
                    'error' => 'Your account does not have a role assigned. Please contact administrator.'
                ], 403);
            }
            abort(403, 'Your account does not have a role assigned. Please contact administrator.');
        }

        // If no permission is required, allow access
        if ($permission == null) {
            return $next($request);
        }

        try {
            $role_has_permissions = Permission::where('role_id', $user->role_id)->pluck('permission')->toArray();
            $role_has_permissions = array_unique($role_has_permissions);
            
            if (in_array($permission, $role_has_permissions)) {
                // Permission exists, check route if specified
                if ($routes == null) {
                    return $next($request);
                }
                
                $permission_has_routes = Permission::where('role_id', $user->role_id)
                    ->where('permission', $permission)
                    ->pluck('routes')
                    ->toArray();
                
                if (in_array($routes, $permission_has_routes)) {
                    return $next($request);
                } else {
                    // User has permission but not for this specific route
                    \Log::warning('User ' . $user->id . ' attempted to access route ' . $routes . ' without permission');
                    if ($request->expectsJson()) {
                        return response()->json([
                            'message' => 'Forbidden',
                            'error' => 'You do not have permission to access this route.'
                        ], 403);
                    }
                    abort(403, 'You do not have permission to access this route.');
                }
            } else {
                // User doesn't have the required permission
                \Log::warning('User ' . $user->id . ' attempted to access permission ' . $permission . ' without authorization');
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Forbidden',
                        'error' => 'You do not have permission to perform this action.'
                    ], 403);
                }
                abort(403, 'You do not have permission to perform this action.');
            }
        } catch (\Exception $e) {
            \Log::error('Permission check error: ' . $e->getMessage());
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Internal Server Error',
                    'error' => 'An error occurred while checking permissions.'
                ], 500);
            }
            abort(500, 'An error occurred while checking permissions.');
        }

        return $next($request);
    }
}