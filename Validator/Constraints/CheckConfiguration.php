<?php

namespace IDCI\Bundle\ConfigurationValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CheckConfiguration extends Constraint
{
    public $message = 'You\'ve got an error with this message: {{ message }}.';
    public $rule;

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return array('rule');
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'check_configuration';
    }
}
