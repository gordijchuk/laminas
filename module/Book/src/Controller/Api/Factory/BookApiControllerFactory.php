<?php

namespace Book\Controller\Api\Factory;

use Book\Service\BookService;
use Book\Controller\Api\BookApiController;
use Psr\Container\ContainerInterface;

class BookApiControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bookService = $container->get(BookService::class);
        return new BookApiController($bookService);
    }
}
