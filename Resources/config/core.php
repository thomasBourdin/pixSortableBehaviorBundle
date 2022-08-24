<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator;
use Pix\SortableBehaviorBundle\Controller\SortableAdminController;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->services()
        ->set('pix_sortable_behavior.controller', SortableAdminController::class)
            ->public()
            ->tag('container.service_subscriber')
            ->call('setContainer', [new ReferenceConfigurator(ContainerInterface::class)])
            ->call('setPositionHandler', [new ReferenceConfigurator('pix_sortable_behavior.position')])
    ;
};
