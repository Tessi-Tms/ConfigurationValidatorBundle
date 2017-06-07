<?php

namespace IDCI\Bundle\ConfigurationValidatorBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use IDCI\Bundle\ConfigurationValidatorBundle\DependencyInjection\Compiler\ConfigurationRuleCompilerPass;

class IDCIConfigurationValidatorBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ConfigurationRuleCompilerPass());
    }
}
