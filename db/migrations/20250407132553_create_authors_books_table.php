<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateAuthorsBooksTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('authors_books', ['id' => false, 'primary_key' => ['author_id', 'book_id']])
            ->addColumn('author_id', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('book_id', 'integer', ['null' => false, 'signed' => false])
            ->addForeignKey('author_id', 'authors', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('book_id', 'books', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
