<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateBooksTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('books')
            ->addColumn('title', 'string')
            ->addColumn('publisher_id', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('details_id', 'integer', ['null' => false, 'signed' => false])
            ->addIndex(['details_id'], ['unique' => true])
            ->addForeignKey('publisher_id', 'publishers', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('details_id', 'book_details', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
