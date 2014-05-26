<?php

namespace Synopsis\Bundle\SubjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Synopsis\Bundle\SubjectBundle\Entity\Subject;

/**
 * Class SubjectController
 *
 * @package Synopsis\Bundle\SubjectBundle\Controller
 */
class SubjectController extends Controller
{

    /**
     * View the details for a specific subject.
     *
     * @param Subject $subject The subject to view.
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction ( Subject $subject )
    {
        return $this->render('SynopsisSubjectBundle:Subject:show.html.twig', [
            'subject' => $subject,
            'events'  => $subject->getEvents(),
        ]);
    }

}
