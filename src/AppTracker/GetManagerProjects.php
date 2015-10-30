<?php

namespace AppTracker;

use Apps\ProjectRepositoryInterface;
use Apps\ProjectManager;

class GetManagerProjects
{
    private $repository;

    public function __construct(ProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getManagerProjects(ProjectManager $manager)
    {
        return $this->repository->getManagerProjects($manager);
    }
}
