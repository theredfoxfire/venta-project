<?php

namespace AppTracker\Ceremonies;

use Apps\SprintRepositoryInterface;
use Apps\Ceremonies\Sprint;
use Apps\Project;

class InMemorySprintRepository implements SprintRepositoryInterface
{
    private $sprints = [];

    public function save(Sprint $sprint)
    {
        $project = $sprint->getProject();

        if (!isset($this->sprints[$project->getName()])) {
            $this->sprints[$project->getName()] = [];
        }

        $this->sprints[$project->getName()][] = $sprint;
    }

    public function getProjectSprints(Project $project)
    {
        if (!isset($this->sprints[$project->getName()])) {
            return [];
        }

        return $this->sprints[$project->getName()];
    }
}
