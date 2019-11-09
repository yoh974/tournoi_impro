<?php


namespace App\Controller;


use App\Entity\Equipe;
use App\Entity\Games;
use App\Repository\GamesRepository;
use App\Repository\PersonneRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/",name="index")
     */
    public function index(GamesRepository $gamesRepository)
    {

        $games = $gamesRepository->findAll();
        return $this->render("index.html.twig",
            compact("games")
        );
    }

}
