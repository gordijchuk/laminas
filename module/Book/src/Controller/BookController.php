<?php

namespace Book\Controller;

use Book\Service\BookService;
use Laminas\View\Model\ViewModel;
use Laminas\Mvc\Controller\AbstractActionController;

class BookController extends AbstractActionController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function indexAction()
    {
        $books = $this->bookService->getAllBooks();

        return new ViewModel([
            'books' => $books
        ]);
    }

    public function viewAction(): ViewModel
    {
        $id = (int) $this->params()->fromRoute('id');
        $book = $this->bookService->getBookById($id);

        if (!$book) {
            return $this->redirect()->toRoute('books');
        }

        return new ViewModel([
            'book' => $book,
        ]);
    }

    public function addAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->bookService->createTestBook();
            return $this->redirect()->toRoute('books');
        }

        return new ViewModel();
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id');

        if ($id <= 0) {
            return $this->redirect()->toRoute('books');
        }

        $this->bookService->deleteBookById($id);

        return $this->redirect()->toRoute('books');
    }
}
