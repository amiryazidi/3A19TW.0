<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

      #[Route('/show', name: 'app_show')]
    public function show(): Response
    {
        return new Response('bonjour');
    }
        #[Route('/show2', name: 'app_show2')]
    public function show2(): Response
    {
        return new Response('<h1>bonjour</h1>');
    }

        #[Route('/json', name: 'app_json')]
    public function jsonn(): Response
    {
        return new JsonResponse('bonjour');
    }
    #[Route('/message/{name}', name: 'app_test')] // 1ére etape : creation de la route parametré
    public function message(string $name): Response // 2éme etape : creation de la methode avec le parametre
    {
        return $this->render('test/message.html.twig', [
            'test' => $name,   // 3éme etape : passage du parametre a la vue
        ]);
    }

}
