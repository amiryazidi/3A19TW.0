<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

    class HomeController{

        #[Route('/home', name :'app_home')]
        function show (): Response{
            return new Response('Bonjour');
        }
    }

?>