<?php

namespace Synopsis\Bundle\SubjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\CoreBundle\Exception\InvalidFormException,
    Synopsis\Bundle\SubjectBundle\Entity\Subject;

/**
 * Class SubjectController
 *
 * @package Synopsis\Bundle\SubjectBundle\Controller
 */
class SubjectController extends Controller
{

    /**
     * Subject index listing.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction ()
    {
        return $this->render('SynopsisSubjectBundle:Subject:index.html.twig', [
            'subjects' => $this->get('synopsis.repository.subject')->getCollectionOrdered(['createdAt' => 'DESC']),
        ]);
    }

    /**
     * Create a new subject.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction ( Request $request )
    {
        try {
            $subject = $this->get('synopsis.manager.subject')->post($request);
            return $this->redirect($this->generateUrl('subject_show', ['uuid' => $subject->getUuid()]));
        } catch ( InvalidFormException $exception ) {
            return $this->render('SynopsisSubjectBundle:Subject:new.html.twig', [
                'form' => $exception->getForm()->createView(),
            ]);
        }
    }

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
