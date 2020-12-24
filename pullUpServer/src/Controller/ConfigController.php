<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConfigController extends AbstractController
{
    /**
     * @Route("/config", name="config", methods={"get"})
     */
    public function index(Request $request): Response
    {
        $ip = $request->server->get('REMOTE_ADDR');
        
        if(true){
            $config = [
                "repo" => "https://github.com/greggailly/pullUpTest.git",
                "updates" => "minor",
                "offset" => "48h"
            ];
            return New JsonResponse($config, 200);
        } else {
            return New JsonResponse([], 401);
        }
    }
}
