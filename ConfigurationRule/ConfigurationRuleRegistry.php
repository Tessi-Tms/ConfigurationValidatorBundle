<?php

/**
 * @author Brahim Boukoufallah <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\ConfigurationValidatorBundle\ConfigurationRule;

use IDCI\Bundle\ConfigurationValidatorBundle\Exception\UnexpectedTypeException;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class ConfigurationRuleRegistry implements ConfigurationRuleRegistryInterface
{
    protected $configurationRules = array();

    /**
     * {@inheritdoc}
     */
    public function setConfigurationRule($alias, ConfigurationInterface $configurationRule)
    {
        $this->configurationRules[$alias] = $configurationRule;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationRules()
    {
        return $this->configurationRules;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationRule($alias)
    {
        if (!is_string($alias)) {
            throw new UnexpectedTypeException($alias, 'string');
        }

        if (!isset($this->configurationRules[$alias])) {
            throw new \InvalidArgumentException(sprintf('Could not load configuration rule "%s"', $alias));
        }

        return $this->configurationRules[$alias];
    }

    /**
     * {@inheritdoc}
     */
    public function hasConfigurationRule($alias)
    {
        return isset($this->configurationRules[$alias]);
    }
}
