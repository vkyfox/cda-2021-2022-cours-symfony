<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/about")
     */
    public function index()
    {
        $params = 
        [
            'title' => 'About'
        ];

        $data =
        [
            'Lorem', 'Ipsum', 'Dolor', 'Sit', 'Amet'
        ];

        return $this->render(
            'about/index.html.twig',
            [
                'title' => 'about',
                'data' => $data
            ]
        );
    }
}