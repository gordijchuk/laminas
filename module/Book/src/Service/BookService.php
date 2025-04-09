<?php

namespace Book\Service;

use Book\Entity\Author;
use Book\Entity\Book;
use Book\Entity\Publisher;
use Book\Entity\BookDetails;
use Book\Entity\Genre;
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

        $genre = $this->entityManager->getRepository(Genre::class)->findOneBy([]);
        $author = $this->entityManager->getRepository(Author::class)->findOneBy([]);

        $book->authors->add($author);
        $book->genres->add($genre);

        $this->entityManager->persist($details);
        $this->entityManager->persist($book);
        $this->entityManager->flush();
    }

    public function deleteBookById(int $bookId)
    {
        $book = $this->entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            return false;
        }

        $this->entityManager->remove($book);
        $this->entityManager->flush();
    }
}
