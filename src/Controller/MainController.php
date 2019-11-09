<?php


namespace App\Controller;


use App\Entity\Equipe;
use App\Entity\Games;
use App\Repository\EquipeRepository;
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
    /**
     * @Route("/equipes.html.twig",name="equipe_show")
     */
    public function equipes(EquipeRepository $equipeRepository)
    {
        $equipes = $equipeRepository->findAll();
        return $this->render("equipes.html.twig", compact("equipes"));
    }

    /**
     * @Route("/equipe/{id}",name="equipe_detail")
     */
    public function  equipe_detail(EquipeRepository $equipeRepository,$id)
    {
        $equipe = $equipeRepository->find($id);
        return $this->render("equipe_detail.html.twig",compact("equipe"));
    }

}
