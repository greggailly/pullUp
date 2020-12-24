<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EnrollController extends AbstractController
{
    /**
     * @Route("/enroll", name="enroll", methods={"POST"})
     */
    public function index(Request $request): Response
    {

        $ip = $request->server->get('REMOTE_ADDR');
        //dd($ip = $request->server);

        return New JsonResponse(["enroll" => "OK"], 201);
    }
}
