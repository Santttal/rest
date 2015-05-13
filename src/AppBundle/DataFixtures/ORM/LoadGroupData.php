<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Group;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGroupData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userRepository = $manager->getRepository(User::class);

        $userAdmin = $userRepository->findOneBy([
            'login' => 'Artur'
        ]);
        $groupAdmins = new Group();
        $groupAdmins->setName('admins');
        $groupAdmins->addUser($userAdmin);
        $manager->persist($groupAdmins);

        $userAndrey = $userRepository->findOneBy([
            'login' => 'Andrey'
        ]);
        $groupLamers = new Group();
        $groupLamers->setName('lamers');
        $groupLamers->addUser($userAndrey);
        $manager->persist($groupLamers);

        $manager->flush();
    }
}
