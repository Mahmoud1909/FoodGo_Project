<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Handle 403 Forbidden errors with better messages
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            $statusCode = $exception->getStatusCode();
            
            if ($statusCode == 403) {
                $message = $exception->getMessage() ?: 'You do not have permission to access this resource.';
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Forbidden',
                        'error' => $message
                    ], 403);
                }
                
                if (view()->exists('errors.403')) {
                    return response()->view('errors.403', [
                        'message' => $message
                    ], 403);
                }
                return response($message, 403);
            }
            
            // Handle 500 Internal Server Error
            if ($statusCode == 500) {
                $message = config('app.debug') ? $exception->getMessage() : 'An internal server error occurred. Please try again later.';
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Internal Server Error',
                        'error' => $message
                    ], 500);
                }
                
                if (view()->exists('errors.500')) {
                    return response()->view('errors.500', [
                        'message' => $message,
                        'exception' => config('app.debug') ? $exception : null
                    ], 500);
                }
            }
        }
        
        // Handle all other exceptions (including 500 errors from other sources)
        if ($exception instanceof \Exception || $exception instanceof \Error) {
            // Log the error for debugging
            if (config('app.debug')) {
                \Log::error('Unhandled exception', [
                    'message' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTraceAsString()
                ]);
            }
            
            // For production, show friendly error page
            if (!$request->expectsJson() && !config('app.debug')) {
                if (view()->exists('errors.500')) {
                    return response()->view('errors.500', [
                        'message' => 'An unexpected error occurred. Please try again later.',
                        'exception' => null
                    ], 500);
                }
            }
        }

        return parent::render($request, $exception);
    }
}
