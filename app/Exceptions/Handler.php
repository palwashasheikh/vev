<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return $exception->getMessage();
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'Flag' => 0,
                'Message' =>'The requested HTTP verb are not supported',
                'Data'=> null,
                'Errors' => array(
                    "HTTP VERB"=>'This method is not allowed.'
                )
            ], 200);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'Flag' => 0,
                'Message' =>'We are sorry, no such request exist',
                'Data'=> null,
                'Errors' => array(
                    "Unknown"=>'Invalid Request, No result found'
                )
            ], 404);
        }
        return parent::render($request, $exception);
    }
}
