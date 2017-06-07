<?php

namespace IDCI\Bundle\ConfigurationValidatorBundle\Validator\Constraints;

use IDCI\Bundle\ConfigurationValidatorBundle\ConfigurationRule\ConfigurationRuleRegistry;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CheckConfigurationValidator extends ConstraintValidator
{
    /** @var ConfigurationRuleRegistry */
    protected $configurationRuleRegistry;

    public function __construct(ConfigurationRuleRegistry $configurationRuleRegistry)
    {
        $this->configurationRuleRegistry = $configurationRuleRegistry;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (class_exists($constraint->rule)) {
            $configuration = new $constraint->rule();
        } else {
            $configuration = $this->configurationRuleRegistry->getConfigurationRule($constraint->rule);
        }

        $configs = is_array($value) ? $value : json_decode($value, true);
        $processor = new Processor();

        try {
            $processor->processConfiguration($configuration, $configs);
        } catch (\Exception $e) {
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('{{ message }}', $e->getMessage())
                ->addViolation()
            ;
        }
    }
}
