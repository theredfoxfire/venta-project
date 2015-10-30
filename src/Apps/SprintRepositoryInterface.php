<?php

namespace Apps;

interface SprintRepositoryInterface
{
    public function save(Sprint $sprint);
    public function getProjectSprints(Project $project);
}
