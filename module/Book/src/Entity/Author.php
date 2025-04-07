<?php

namespace Book\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'authors')]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    public int $id;

    #[ORM\Column(type: 'string')]
    public string $first_name;

    #[ORM\Column(type: 'string')]
    public string $last_name;

    #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'authors')]
    public Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }
}
