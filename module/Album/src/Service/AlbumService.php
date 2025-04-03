<?php

namespace Album\Service;

use Doctrine\ORM\EntityManager;

class AlbumService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllAlbums()
    {
        return $this->entityManager->getRepository(\Album\Entity\Album::class)->findAll();
    }

    public function test2()
    {
        return $this->entityManager->createQueryBuilder()
            ->select('a')
            ->from('Album\Entity\Album', 'a')
            ->where('a.artist = :artist')
            ->setParameter('artist', 'test1')
            ->getQuery()
            ->getResult();
    }

    public function test()
    {
        $dql = "SELECT a FROM Album\Entity\Album a WHERE a.title = :title";
        $query = $this->entityManager->createQuery($dql)
            ->setParameter('title', 'test title');
        return $query->getResult();
    }
}
