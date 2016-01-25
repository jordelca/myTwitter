<?php

namespace AppBundle\Model;

use AppBundle\Entity\Twit;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\SecurityContext;

class TwitManager {

    private $repository;
    private $context;

    public function __construct(ObjectManager $om, SecurityContext $context)
    {
        $this->repository = $om->getRepository('AppBundle:Twit');
        $this->context = $context;
    }

    public function findTwitsByUser($user)
    {
        return $this->repository->findBy(array("srcUsrId" => $user ));
    }

}