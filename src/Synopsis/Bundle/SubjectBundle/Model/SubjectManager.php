<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\CoreBundle\Exception\InvalidFormException;
use Synopsis\Bundle\CoreBundle\Model\AbstractManager;

/**
 * Class SubjectManager
 *
 * @package Synopsis\Bundle\SubjectBundle\Manager
 */
class SubjectManager extends AbstractManager
{

    /**
     * Find a single subject via UUID.
     *
     * @todo: This belongs in the subject repository!
     *
     * @param string $uuid The subject's UUID.
     * @return SubjectInterface
     */
    public function getByUuid ( $uuid )
    {
        return $this->repository->findOneBy([
            'uuid' => $uuid,
        ]);
    }

    /**
     * Create a new subject.
     *
     * @param Request $request The request.
     * @return SubjectInterface
     */
    public function post ( Request $request )
    {
        /* @var $subject \Synopsis\Bundle\SubjectBundle\Model\SubjectInterface */
        $subject = new $this->entityClass();
        $user    = $this->container->get('security.context')->getToken()->getUser();
        $subject->setUser($user);

        // Create and process the subject form
        $form    = $this->createForm($subject, 'POST');
        $subject = $this->processForm($form, $request, $subject);

        return $subject;
    }

    /**
     * Processes the form.
     *
     * @param Form $form The form to process.
     * @param Request $request The request.
     * @param SubjectInterface $subject The subject to process.
     * @throws InvalidFormException
     * @return SubjectInterface The processed subject.
     */
    protected function processForm ( Form $form, Request $request, SubjectInterface $subject )
    {
        $form->handleRequest($request);

        if ( $form->isValid() ) {
            $this->om->persist($subject);
            $this->om->flush($subject);

            return $subject;
        }

        throw new InvalidFormException('Invalid form submitted.', $form);
    }

    /**
     * Create a form.
     *
     * @param SubjectInterface $subject
     * @param string $method The HTTP method.
     * @return Form
     */
    protected function createForm ( SubjectInterface $subject, $method )
    {
        return $this->formFactory->create('subject', $subject, ['method' => $method]);
    }

}