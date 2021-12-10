<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $data = ['Annonce 1', 'Annonce 2', 'Annonce 3', 'Annonce 4'];
        // affiche le fichier index.html.twig
        return $this->render('home/index.html.twig',
        [
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem quam cum corrupti modi cupiditate nostrum odit illo veniam, nulla neque officia expedita rerum, aliquid libero incidunt rem iusto reprehenderit maxime!',
            'title' => 'Le nom de votre site',
            'data' => $data,
            'date' => new DateTime()
        ]
        );
    }
}