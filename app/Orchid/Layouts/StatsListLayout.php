<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StatsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'stats';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('user_name','Kullanıcı'),
            TD::set('product_name','Ürün'),
            TD::set('search','Arama'),
            TD::set('created_at', 'Tarih'),
        ];
    }

    protected function textNotFound(): string
{
    return __('Ana Sayfa');
}

}
