<?php

namespace Synopsis\Bundle\SubjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Synopsis\Bundle\SubjectBundle\Entity\SubjectAction;

/**
 * Class SubjectActionController
 *
 * @package Synopsis\Bundle\SubjectBundle\Controller
 */
class SubjectActionController extends Controller
{

    /**
     * Subject action index listing.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction ()
    {
        return $this->render('SynopsisSubjectBundle:SubjectAction:index.html.twig', [
            'actions' => $this->get('synopsis.repository.subject.action')->getCollectionOrdered(['createdAt' => 'DESC']),
        ]);
    }

    /**
     * View the details for a specific subject action.
     *
     * @param SubjectAction $action The subject action to view.
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction ( SubjectAction $action )
    {
        return $this->render('SynopsisSubjectBundle:SubjectAction:show.html.twig', [
            'action' => $action,
        ]);
    }

}
