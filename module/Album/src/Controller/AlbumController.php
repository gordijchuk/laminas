<?php

namespace Album\Controller;

use Album\Service\AlbumService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    private AlbumService $albumService;

    public function __construct(AlbumService $albumService)
    {
        $this->albumService = $albumService;
    }

    public function indexAction()
    {
        $albums = $this->albumService->test();

        return new ViewModel([
            'albums' => $albums
        ]);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
