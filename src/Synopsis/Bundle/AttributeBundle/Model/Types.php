<?php

namespace Synopsis\Bundle\AttributeBundle\Model;

/**
 * Class Types
 *
 * @package Synopsis\Bundle\AttributeBundle\Model
 */
class Types
{

    const CHECKBOX = 'checkbox';

    const CHOICE = 'choice';

    const MONEY = 'money';

    const NUMBER = 'number';

    const PERCENTAGE = 'percent';

    const TEXT = 'text';

    /**
     * Get all attribute types in an array.
     *
     * @return array
     */
    public function getTypes ()
    {
        return [
            self::CHECKBOX   => 'Checkbox',
            self::CHOICE     => 'Choice',
            self::MONEY      => 'Money',
            self::NUMBER     => 'Number',
            self::PERCENTAGE => 'Percentage',
            self::TEXT       => 'Text',
        ];
    }

}