<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Apps\Project as BaseProject;
use Apps\ProjectManager as BaseProjectManager;
use Apps\ProjectRepositoryInterface;

class ProjectRepository extends EntityRepository implements ProjectRepositoryInterface
{
    public function save(BaseProject $project)
    {
        $this->_em->persist($project);
        $this->_em->flush();
    }

    public function getManagerProjects(BaseProjectManager $manager)
    {
        return $this->findBy(['manager' => $manager]);
    }
}
