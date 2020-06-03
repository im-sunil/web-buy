<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Valitron\Validator;
use App\Controllers\Controller;
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use Psr\Http\Message\RequestInterface;

class RegisterController extends Controller
{
    public function __construct(EntityManager $db, Response $response)
    {
        $this->db = $db;
        $this->response = $response;
    }

    public function store(RequestInterface $request)
    {
        dump($request->getParsedBody());
        $validator = $this->validateRegistration($request);
        if (!$validator->validate()) {
            return $this->json($validator->errors(), 422);
        }
        return $this->json(['validator']);
    }

    protected function validateRegistration($request)
    {
        $validator = new Validator($request->getParsedBody());

        $validator->mapFieldsRules([
            'email' => ['required', 'email', ['exists', User::class]],
            'name' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required', ['equals', 'password']],
        ]);

        return $validator;
    }
}
