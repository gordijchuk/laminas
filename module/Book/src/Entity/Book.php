<?php

namespace Book\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Book\Attribute\AutoCreatedDate;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'books')]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    public int $id;

    #[ORM\Column(type: 'string')]
    public string $title;

    #[ORM\ManyToOne(targetEntity: Publisher::class, inversedBy: 'books')]
    #[ORM\JoinColumn(name: 'publisher_id', referencedColumnName: 'id')]
    public Publisher $publisher;

    #[ORM\OneToOne(targetEntity: BookDetails::class, inversedBy: 'book')]
    #[ORM\JoinColumn(name: 'details_id', referencedColumnName: 'id')]
    public BookDetails $details;

    #[ORM\Column(type: 'datetime_immutable')]
    #[AutoCreatedDate]
    public ?DateTimeImmutable $created_at = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books')]
    #[ORM\JoinTable(name: 'authors_books')]
    #[ORM\JoinColumn(name: 'book_id', referencedColumnName: 'id')]
    #[ORM\inverseJoinColumn(name: 'author_id', referencedColumnName: 'id')]
    public Collection $authors;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'books')]
    #[ORM\JoinTable(name: 'books_genres')]
    #[ORM\JoinColumn(name: 'book_id', referencedColumnName: 'id')]
    #[ORM\inverseJoinColumn(name: 'genre_id', referencedColumnName: 'id')]
    public Collection $genres;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
        $this->genres = new ArrayCollection();
    }
}
