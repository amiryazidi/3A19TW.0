<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListAuthorsController extends AbstractController
{
    #[Route('/list/author', name: 'app_list_authors')]
    public function index(): Response
    {
        return $this->render('list_authors/index.html.twig', [
            'controller_name' => 'ListAuthorsController',
        ]);
    }

    
    #[Route('/list/authors', name: 'app_list_authors')]
    public function listAuthors(): Response
    {
                    $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            
        return $this->render('list_authors/index.html.twig', [
            'controller_name' => 'ListAuthorsController',
            'authors' => $authors
        ]);
    }
}
