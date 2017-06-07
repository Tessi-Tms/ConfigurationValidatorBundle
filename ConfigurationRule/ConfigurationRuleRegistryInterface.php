<?php

/**
 * @author Brahim Boukoufallah <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\ConfigurationValidatorBundle\ConfigurationRule;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use IDCI\Bundle\ConfigurationValidatorBundle\Exception\UnexpectedTypeException;

interface ConfigurationRuleRegistryInterface
{
    /**
     * Set configuration rule.
     *
     * @param string                 $alias
     * @param ConfigurationInterface $rule
     *
     * @return ConfigurationRuleRegistryInterface
     */
    public function setConfigurationRule($alias, ConfigurationInterface $rule);

    /**
     * Get configuration rules.
     *
     * @return ConfigurationInterface[]
     */
    public function getConfigurationRules();

    /**
     * Get configuration rule.
     *
     * @param string $alias
     *
     * @return ConfigurationInterface
     *
     * @throws UnexpectedTypeException   if the passed alias is not a string.
     * @throws \InvalidArgumentException if the configuration rule can not be retrieved.
     */
    public function getConfigurationRule($alias);

    /**
     * Has configuration rule.
     *
     * @param string $alias
     *
     * @return bool
     */
    public function hasConfigurationRule($alias);
}
