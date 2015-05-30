<?php

/*
 * This file is part of the gnugat/marshaller-bundle package.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\MarshallerBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class GnugatMarshallerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator(__DIR__.'/../Resources/config');
        $loader = new YamlFileLoader($container, $fileLocator);
        $loader->load('services.yml');

        $this->addClassesToCompile(array(
            'Gnugat\\Marshaller\\Marshaller',
            'Gnugat\\Marshaller\\MarshallerStrategy',
            'Gnugat\\Marshaller\\NotSupportedException',
        ));
    }
}
