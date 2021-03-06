<?php

namespace App\Controllers\Auth;

use App\Jwt\Auth;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Valitron\Validator;
use App\Hashing\BcryptHasher;
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
        $validator = $this->validateRegistration($request);
        if (!$validator->validate()) {
            return $this->json($validator->errors(), 422);
        }
        $user = $this->createUser($request->getParsedBody());

        return $this->json([
            'message' => 'Register successfully.',
            'isLogin' => true,
            'token' => Auth::encode($user),
            'user' => $user
        ]);
    }

    protected function createUser($data)
    {
        $user = new User($this->db);

        $user->fill([
            'uiid' => $uuid = Uuid::uuid4()->toString(),
            'email' => $data['email'] ?? null,
            'mobile' => $data['mobile'] ?? null,
            'username' => $data['username'] ?? null,
            'password' => (new BcryptHasher)->create($data['password'])
        ]);

        $this->db->persist($user);
        $this->db->flush();

        return $user;
    }

    protected function validateRegistration($request)
    {
        $v = new Validator($request->getParsedBody());

        $v->mapFieldsRules([
            'email' => ['required', 'email', ['exists', User::class]],
            'username' => ['required', ['exists', User::class]],
            'mobile' => ['required', 'numeric', ['exists', User::class]],
            'password' => ['required', ],
            'password_confirmation' => ['required', ['equals', 'password']],
        ]);
        $v->rule('length', 'mobile', 10)->message('{field} must be 10 digits long');

        $v->rule('lengthMin', 'username', 2);
        $v->rule('lengthMax', 'username', 20);

        $v->rule('lengthMin', 'password', 6);
        $v->rule('lengthMax', 'password', 20);

        return $v;
    }
}
