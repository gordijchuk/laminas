<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateBookDetailsTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('book_details')
            ->addColumn('number_of_pages', 'integer')
            ->create();
    }
}
