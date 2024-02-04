<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

//    public function render($request, Exception|Throwable $exception)
//    {
//
//        $response = parent::render($request, $exception);
//
//        if ($request->is('api/*')) {
//            $content = json_decode($response->getContent());
//            $response->setContent(json_encode($content));
//        }
//
//        return $response;
//    }
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
