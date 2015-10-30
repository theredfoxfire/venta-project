<?php

namespace Apps;

interface ProjectRepositoryInterface
{
    public function save(Project $project);
    public function getManagerProjects(ProjectManager $manager);
}
