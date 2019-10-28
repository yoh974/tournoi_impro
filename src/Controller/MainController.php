<?php


namespace App\Controller;


use App\Entity\Games;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/",name="index")
     */
    public function index(PersonneRepository $personneRepository)
    {
        $personnes = $personneRepository->findAll();
        return $this->render("index.html.twig",
            compact("personnes")
        );
    }

}
