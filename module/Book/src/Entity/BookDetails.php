<?php

namespace Book\Entity;

use Book\Entity\Book;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'book_details')]
class BookDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    public int $id;

    #[ORM\Column(type: 'integer')]
    public int $number_of_pages;

    #[ORM\OneToOne(targetEntity: Book::class, mappedBy: 'details')]
    public Book $book;
}
