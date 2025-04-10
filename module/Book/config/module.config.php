<?php

namespace Book;

use Laminas\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\BookController::class => Controller\Factory\BookControllerFactory::class,
            Controller\Api\BookApiController::class => Controller\Api\Factory\BookApiControllerFactory::class,
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
            'api.books' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/api/books',
                    'defaults' => [
                        'controller' => Controller\Api\BookApiController::class,
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                        ],
                    ],
                    'search' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/search',
                            'defaults' => [
                                'action' => 'search',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
