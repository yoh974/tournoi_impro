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
     * @Route("/equipes",name="equipe_show")
     */
    public function equipes(EquipeRepository $equipeRepository)
    {
        $equipes = $equipeRepository->findAll();
        return $this->render("equipes.html.twig", compact("equipes"));
    }

    /**
     * @Route("/equipe/{id}",name="fiche_equipe")
     */
    public function  fiche_equipe(EquipeRepository $equipeRepository, $id)
    {
        $equipe = $equipeRepository->find($id);
        return $this->render("equipe_detail.html.twig",compact("equipe"));
    }
    /**
     * @Route("/joueur/{id}",name="fiche_joueur")
     */
    public function fiche_joueur(PersonneRepository $personneRepository, $id)
    {
        $joueur = $personneRepository->find($id);
        return $this->render("fiche_joueur.html.twig",compact($joueur));
    }

}
