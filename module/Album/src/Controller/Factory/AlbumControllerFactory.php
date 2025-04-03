<?php

namespace Album\Controller\Factory;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Album\Controller\AlbumController;
use Album\Service\AlbumService;

class AlbumControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $albumService = $container->get(AlbumService::class);
        return new AlbumController($albumService);
    }
}
