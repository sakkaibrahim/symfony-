<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    // Exercice 1 : Affichage d'une variable name
    #[Route('/author/show/{name}', name: 'author_show')]
    public function showAuthor(string $name): Response
    {
        return $this->render('show.html.twig', [
            'name' => $name,
        ]);
    }

    // Exercice 2 : Liste des auteurs
    #[Route('/authors/list', name: 'authors_list')]
    public function listAuthors(): Response
    {
        $authors = [
            [
                'id' => 1, 
                'picture' => '/images/Victor-Hugo.jpg', 
                'username' => 'Victor Hugo', 
                'email' => 'victor.hugo@gmail.com', 
                'nb_books' => 100
            ],
            [
                'id' => 2, 
                'picture' => '/images/william-shakespeare.jpg', 
                'username' => 'William Shakespeare', 
                'email' => 'william.shakespeare@gmail.com', 
                'nb_books' => 200
            ],
            [
                'id' => 3, 
                'picture' => '/images/Taha_Hussein.jpg', 
                'username' => 'Taha Hussein', 
                'email' => 'taha.hussein@gmail.com', 
                'nb_books' => 300
            ],
        ];

        return $this->render('list.html.twig', [
            'authors' => $authors,
        ]);
    }

    // Détails d'un auteur par id
    #[Route('/author/details/{id}', name: 'author_details')]
    public function authorDetails(int $id): Response
    {
        $authors = [
            1 => [
                'id' => 1, 
                'picture' => '/images/Victor-Hugo.jpg', 
                'username' => 'Victor Hugo', 
                'email' => 'victor.hugo@gmail.com', 
                'nb_books' => 100
            ],
            2 => [
                'id' => 2, 
                'picture' => '/images/william-shakespeare.jpg', 
                'username' => 'William Shakespeare', 
                'email' => 'william.shakespeare@gmail.com', 
                'nb_books' => 200
            ],
            3 => [
                'id' => 3, 
                'picture' => '/images/Taha_Hussein.jpg', 
                'username' => 'Taha Hussein', 
                'email' => 'taha.hussein@gmail.com', 
                'nb_books' => 300
            ],
        ];

        if (!isset($authors[$id])) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        return $this->render('showAuthor.html.twig', [
            'author' => $authors[$id],
        ]);
    }
}
