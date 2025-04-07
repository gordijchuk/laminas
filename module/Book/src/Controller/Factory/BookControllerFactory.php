<?php

namespace Book\Controller\Factory;

use Book\Service\BookService;
use Book\Controller\BookController;
use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class BookControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $bookService = $container->get(BookService::class);
        return new BookController($bookService);
    }
}
