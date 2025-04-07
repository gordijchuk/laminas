<?php

namespace Book;

use Laminas\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\BookController::class => Controller\Factory\BookControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\BookService::class => Service\Factory\BookServiceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'books' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/books[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\BookController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
