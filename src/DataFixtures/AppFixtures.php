<?php

namespace App\DataFixtures;


use App\Entity\Equipe;
use App\Entity\Personne;
use App\Entity\Tournoi;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Gedmo\Sluggable\Util as Sluggable;


class AppFixtures extends Fixture
{

    private $manager, $faker;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager)
    {
        
        $this->loadUsers();
        $this->loadPersonne();
        $this->loadEquipe();
        $this->loadTournoi();
        $this->loadGames();
        $this->loadStatistique();
        $this->loadImageMatch();
        
    }

    private function loadPersonne()
    {
        print_r("Start load Personne\r\n");


        $number = 50;
        $batchSize = 20;
        for ($i = 0; $i < $number; $i++) {
            $name = $this->faker->name;
            $prenom = $this->faker->firstName;
            $email = "contact@" . Sluggable\Urlizer::urlize($name, '') . ".fr";
            $nom_scene = $this->faker->word;

            $personne = new Personne();
            $personne
                ->setNom($name)
                ->setPrenom($prenom)
                ->setEmail($email)
                ->setNomDeScene($nom_scene);



            $this->manager->persist($personne);

            if ((($i + 1) % $batchSize) === 0) {
                $this->manager->flush();
            }
        }

        $this->manager->flush();

        print_r("Done load Personne\r\n");
    }

    private function loadUsers()
    {
        $user = new User();
        $user

            ->setUsername('ADMIN')
            ->setEmail('admin@impro.com')
            ->setPlainPassword('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setEnabled(true);

        $this->manager->persist($user);
        $this->manager->flush();
    }

    private function loadImageMatch()
    {
        
    }

    private function loadEquipe()
    {
        print_r("Start load Equipe\r\n");


        $number = 10;
        $batchSize = 20;
        for ($i = 0; $i < $number; $i++) {
            $name = $this->faker->word;


            $equipe = new Equipe();
            $equipe
                ->setNomEquipe($name)
                ;



            $this->manager->persist($equipe);

            if ((($i + 1) % $batchSize) === 0) {
                $this->manager->flush();
            }
        }

        $this->manager->flush();

        print_r("Done load Equipe\r\n");
    }

    private function loadTournoi()
    {
        print_r("Load Tournoi\r\n");
        $tournoi = new Tournoi();
        $tournoi
            ->setSaison('2019/2020')
            ->setDateDebutTournoi(new \DateTime("2019-10-01"))
            ->setDateFinTournoi(new \DateTime('2020-08-01'));
        $this->manager->persist($tournoi);
        $this->manager->flush();
        print_r("Done load Tournoi\r\n");
    }

    private function loadGames()
    {

    }

    private function loadStatistique()
    {


    }
}
