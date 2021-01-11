<?php

namespace App\Exceptions;

use App\Core\Traits\ResponseTrait;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class Handler extends ExceptionHandler
{
    use ResponseTrait;

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
     * @param Exception $exception
     * @return void
     *
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return Response
     *
     * @throws Exception
     */
    public function render($request, Exception $exception)
    {
        if (!$request->is('api/*') && !$request->expectsJson()) {
            return parent::render($request, $exception);
        }

        if ($exception instanceof TooManyRequestsHttpException) {
            return $this->error('Too many requests', null, 429);
        }

        if ($exception instanceof ValidationException) {
            $validation_messages = $exception->validator->getMessageBag()->getMessages();
            $validation_messages = array_map(static fn($message) => $message[0], $validation_messages);
            return $this->error('Validation failure', $validation_messages, 400);
        }

        return parent::render($request, $exception);
    }
}
