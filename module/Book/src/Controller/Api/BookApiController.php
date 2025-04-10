<?php

namespace Book\Controller\Api;

use Book\Service\BookService;
use Laminas\View\Model\JsonModel;
use Laminas\Mvc\Controller\AbstractRestfulController;

class BookApiController extends AbstractRestfulController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function getList()
    {
        $books = $this->bookService->getAllBooks();
        $data = [];

        foreach ($books as $book) {
            $data[] = [
                'id' => $book->id,
                'title' => $book->title,
                'created_at' => $book->created_at?->format('d.m.Y H:i') ?? '',
            ];
        }

        return new JsonModel($data);
    }

    public function get($id)
    {
        $book = $this->bookService->getBookById($id);

        if (!$book) {
            return new JsonModel(['message' => 'Book not found']);
        }

        return new JsonModel([
            'id' => $book->id,
            'title' => $book->title,
            'created_at' => $book->created_at?->format('d.m.Y H:i') ?? '',
        ]);
    }

    public function create($data)
    {
        $book = $this->bookService->createBookFromApi($data);

        return new JsonModel(['message' => 'Book created', 'id' => $book->id]);
    }

    public function delete($id)
    {
        $this->bookService->deleteBookById($id);

        return new JsonModel(['message' => 'Book deleted']);
    }

    public function searchAction()
    {
        $books = $this->bookService->searchBooks(
            $this->params()->fromQuery('q', '')
        );

        return new JsonModel([
            'results' => array_map(fn ($book) => [
                'id' => $book->id,
                'title' => $book->title,
            ], $books),
        ]);
    }
}
