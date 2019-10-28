<?php
// src/AppBundle/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    const ROLES      = [
        "Administrateur" => "ROLE_ADMIN",
    ];
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\Choice(choices=User::ROLES, multiple=true)
     */
    protected $roles;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
