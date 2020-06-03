<?php

namespace App\Controllers;

use App\Models\User;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\RequestInterface;

class HomeController
{
    protected $db ;

    public function index(RequestInterface $request)
    {
        return [
            'title' => $this->db->getRepository(User::class)->find(1),
            'version' => 1,
        ];
    }
}
