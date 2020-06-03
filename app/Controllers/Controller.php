<?php

namespace App\Controllers;

use Valitron\Validator;
use App\Exceptions\ValidationException;

class Controller
{
    protected $db ;
    protected $response ;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function validate($request, array $rules)
    {
        $validator = new Validator($request->getParsedBody());

        $validator->mapFieldsRules($rules);

        if (!$validator->validate()) {
            throw new ValidationException($request, $validator->errors());
        }

        return $request->getParsedBody();
    }

    public function json($data = [], $status = 200)
    {
        $this->response->getBody()->write(json_encode($data));
        return $this->response->withAddedHeader('content-type', 'application/json')->withStatus($status);
    }
}
