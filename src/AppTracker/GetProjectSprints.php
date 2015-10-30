<?php

namespace AppTracker;

use Apps\SprintRepositoryInterface;
use Apps\Project;

class GetProjectSprints
{
    private $repository;

    public function __construct(SprintRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getProjectSprints(Project $project)
    {
        return $this->repository->getProjectSprints($project);
    }
}
