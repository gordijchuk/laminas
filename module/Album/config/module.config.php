<?php

namespace Album;

use Laminas\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\AlbumController::class => Controller\Factory\AlbumControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\AlbumService::class => Service\Factory\AlbumServiceFactory::class,
            // \Doctrine\ORM\EntityManager::class => function ($container) {
            //     return $container->get('doctrine.entitymanager.orm_default');
            // },
        ],
    ],
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
