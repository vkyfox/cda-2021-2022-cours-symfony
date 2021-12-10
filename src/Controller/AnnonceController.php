<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce", methods={"GET"})
     */
    public function annonce()
    {
        die("Liste des annonces");
    }

    /**
     * @Route("/annonce/{id}",  requirements={"id"="\d+"}, methods={"GET"})
     */
    public function annonceid($id)
    {
        die("Annonce n°" . $id);
    }

    /**
     * @Route("/annonce/{month}-{year}",  requirements={"month"="([0-2][0-9]|3[01])", "year"="\d{4}"}, methods={"GET"})
     */
    public function annoncedate($month, $year)
    {
        die("Annonce du " . $month . "/" . $year);
    }

    /**
     * @Route("/annonce/{slug}",  requirements={"slug"="^[\w0-9]+[\w\-0-9]+$"}, methods={"GET"})
     */
    public function annonceslug($slug)
    {
        die("Annonce " . $slug);
    }
    public function index()
    {
        return $this->render('annonce/index.html.twig');
    }
}
