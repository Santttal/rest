<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Group;
use Doctrine\ORM\EntityRepository;

class GroupRepository extends EntityRepository
{
    /**
     * @param Group $group
     */
    public function add(Group $group)
    {
        $this->getEntityManager()->persist($group);
    }

    /**
     * @param Group $group
     */
    public function update(Group $group)
    {
        $this->getEntityManager()->persist($group);
    }

    public function commit()
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param int $groupId
     * @return Group
     */
    public function findById($groupId)
    {
        $group = $this->findById($groupId);

        return $group;
    }
}
