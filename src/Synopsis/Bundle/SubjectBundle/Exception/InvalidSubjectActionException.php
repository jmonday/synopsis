<?php

namespace Synopsis\Bundle\SubjectBundle\Exception;

/**
 * Class InvalidSubjectActionException
 *
 * @package Synopsis\Bundle\SubjectBundle\Exception
 */
class InvalidSubjectActionException extends \RuntimeException
{

    /**
     * Simple constructor.
     *
     * @param string $message
     */
    public function __construct ( $message )
    {
        parent::__construct($message);
    }

}