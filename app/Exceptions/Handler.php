<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      $exception = $this->prepareException($exception);

      $response = [];
      if (method_exists($exception, 'getStatusCode')) {
        $statusCode = $exception->getStatusCode();
      } else {
        $statusCode = 500;
      }

      switch ($statusCode) {
      case 404:
        $response['error'] = 'Not Found';
        break;

      case 403:
        $response['error'] = 'Forbidden';
        break;

      default:
        $response['error'] = 'Error transaction';
        break;

      }

      if (config('app.debug')) {
        $trace = $exception->getTrace()[0]["function"];
        if($trace == "authenticate"){
          $response['error'] = 'Unauthorised';
          $response['code'] = 401;
        }
        else
          $response['code'] = $exception->getCode();
        //$response['trace'] = $exception->getTrace();
      }

      return response()->json($response, $statusCode);
    }
}
