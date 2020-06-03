<?php

namespace App\Exceptions;

use Exception;
use ReflectionClass;
use Psr\Http\Message\ResponseInterface;

class Handler
{
    protected $exception;

    protected $response;

    public function __construct(
        Exception $exception,
        ResponseInterface $response
    ) {
        $this->exception = $exception;

        $this->response = $response;
    }

    public function respond()
    {
        $class = (new ReflectionClass($this->exception))->getShortName();

        if (method_exists($this, $method = "handle{$class}")) {
            return $this->{$method}($this->exception);
        }

        return $this->unhandledException($this->exception);
    }

    protected function handleValidationException(Exception $e)
    {
        $data = ([
            'errors' => $e->getErrors(),
            'old' => $e->getOldInput(),
        ]);

        return $data;
    }

    protected function unhandledException(Exception $e)
    {
        throw $e;
    }
}
