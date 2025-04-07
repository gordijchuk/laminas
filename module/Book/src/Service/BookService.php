<?php

namespace Book\Service;

use Book\Entity\Book;
use Book\Entity\Publisher;
use Book\Entity\BookDetails;
use Doctrine\ORM\EntityManager;

class BookService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllBooks()
    {
        return $this->entityManager->getRepository(Book::class)->findAll();
    }

    public function getBookById(int $bookId)
    {
        return $this->entityManager->getRepository(Book::class)->find($bookId);
    }

    public function createTestBook()
    {
        $publisher = $this->entityManager->getRepository(Publisher::class)->findOneBy([]);

        $details = new BookDetails();
        $details->number_of_pages = 100;

        $book = new Book();
        $book->title = 'Test Book ' . uniqid();
        $book->publisher = $publisher;
        $book->details = $details;

        $this->entityManager->persist($details);
        $this->entityManager->persist($book);
        $this->entityManager->flush();
    }
}
