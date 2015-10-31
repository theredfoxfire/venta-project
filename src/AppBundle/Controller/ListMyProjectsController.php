<?php

namespace AppBundle\Controller;

use AppTracker\GetManagerProjects;
use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ListMyProjectsController
{
    private $useCase;
    private $securityToken;
    private $projectFormView;
    private $templating;

    public function __construct(
        GetManagerProjects $useCase,
        TokenInterface $securityToken,
        FormView $projectFormView,
        EngineInterface $templating
    )
    {
        $this->useCase = $useCase;
        $this->securityToken = $securityToken;
        $this->projectFormView = $projectFormView;
        $this->templating = $templating;
    }

    /**
    * @Route("/", methods={"GET"})
    */
    public function listAction()
    {
        $projects = $this->useCase->getManagerProjects($this->securityToken->getUser());

        return $this->templating->renderResponse('AppBundle:Projects:list.html.twig', [
            'project_form' => $this->projectFormView,
            'projects'     => array_map([$this, 'prepareProjectView'], $projects),
        ]);
    }

    public function prepareProjectView(Project $project)
    {
        return ['name' => $project->getName()];
    }
}
