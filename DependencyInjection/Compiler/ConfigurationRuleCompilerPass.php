<?php

/**
 * @author: Brahim Boukoufallah <brahim.boukoufallah@idci-consulting.fr>
 */

namespace IDCI\Bundle\ConfigurationValidatorBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ConfigurationRuleCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $registryName = "idci_configuration_validator.configuration_validator_registry";
        if (!$container->hasDefinition($registryName)) {
            return;
        }

        $registryDefinition = $container->getDefinition($registryName);

        foreach ($container->findTaggedServiceIds('idci_configuration_validator.configuration.rule') as $id => $tags) {
            foreach ($tags as $attributes) {
                $alias = isset($attributes['alias'])
                    ? $attributes['alias']
                    : $id
                ;

                $registryDefinition->addMethodCall(
                    'setConfigurationRule',
                    array($alias, new Reference($id))
                );
            }
        }
    }
}
