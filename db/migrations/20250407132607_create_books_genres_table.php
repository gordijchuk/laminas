<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateBooksGenresTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('books_genres', ['id' => false, 'primary_key' => ['book_id', 'genre_id']])
            ->addColumn('book_id', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('genre_id', 'integer', ['null' => false, 'signed' => false])
            ->addForeignKey('book_id', 'books', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('genre_id', 'genres', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
