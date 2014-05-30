<?php

namespace Synopsis\Bundle\CoreBundle\Exception;

use Symfony\Component\Form\FormInterface;

/**
 * Class InvalidFormException
 *
 * @package Synopsis\Bundle\CoreBundle\Exception
 */
class InvalidFormException extends \RuntimeException
{

    /**
     * The invalid form.
     *
     * @var FormInterface
     */
    protected $form;

    /**
     * Simple constructor.
     *
     * @param string $message
     * @param FormInterface $form
     */
    public function __construct ( $message, FormInterface $form = null )
    {
        parent::__construct($message);

        $this->form = $form;
    }

    /**
     * Get the form.
     *
     * @return FormInterface
     */
    public function getForm ()
    {
        return $this->form;
    }

}