<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/api/test", name: "Test controller", methods: ["GET"])]
class TestController extends AbstractController
{
    public function __invoke()
    {
        return $this->json(['message' => 'Hello World!']);
    }
}
