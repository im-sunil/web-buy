<?php

namespace App\Controllers;

use App\Models\User;
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use Psr\Http\Message\RequestInterface;

class HomeController extends Controller
{
    protected $db ;
    protected $response ;

    public function __construct(EntityManager $db, Response $response)
    {
        $this->db = $db;
        $this->response = $response;
    }

    public function index(RequestInterface $request)
    {
        $user = $this->db->getRepository(User::class)->find(2);
        return $this->json($user);
    }
}
