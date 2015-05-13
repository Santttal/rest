<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setAge(27);
        $userAdmin->setLogin('Artur');
        $userAdmin->setPassword('megapass');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}
