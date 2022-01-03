<?php

namespace App\Controller;

use App\Entity\Annonce;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
     /**
     * @Route("/annonce/new")
     */
    public function new()
    {
        $annonce = new Annonce();
        $annonce
        ->setTitle('My NFT live duck collection')
        ->setDescription("I'm selling because I want to invest")
        ->setPrice(100)
        ->setStatus(Annonce::STATUS_PERFECT)
        ->setCreatedAt(new DateTimeImmutable())
        ->setIsSold(false)
        ;

        dump($annonce);
        $doctrine = $this->getdoctrine();
        $entityManager = $doctrine->getManager();
        $entityManager->persist($annonce);
        $entityManager->flush();


        dump($annonce);
        die('nouvelle annonce');
    }

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
        $doctrine = $this->getDoctrine();
        $annonceRepository = $doctrine->getRepository(Annonce::class);
        $annonce = $annonceRepository->find($id);
        
        return $this->render('annonce/show.html.twig',
        [
            'annonce' => $annonce
        ]
        );
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
    
    /**
     * @Route("/annonces", name="Annonces")
     */

    public function index(): Response
    {
        $doctrine = $this->getDoctrine();
        $annonceRepository = $doctrine->getRepository(Annonce::class);
        $annonces = $annonceRepository->findAll();


        return $this->render('annonce/index.html.twig',
        [
            'annonces' => $annonces
        ]
        );
    }
}
