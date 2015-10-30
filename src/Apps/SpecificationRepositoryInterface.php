<?php

namespace Apps;

interface SpecificationRepositoryInterface
{
    public function save(Specification $specification);
    public function getSpecificationForSprintLength($sprintLength);
}
